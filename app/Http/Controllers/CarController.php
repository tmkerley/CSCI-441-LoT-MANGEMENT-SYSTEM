<?php

namespace App\Http\Controllers;

use App\DataTables\CarsDataTable;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Space;
use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('cars.index');
    }

    //CRUD

    public function show($id)
    {
    $car = Car::find($id);

    if (!$car) {
        return redirect()->route('cars.index')->with('error', 'Car not found!');
    }

    return view('cars.show', ['car' => $car]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'vinNo' => 'required|unique:cars',
            'space_id' => 'required|exists:spaces,id',
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'isBeingMoved' => 'boolean',
        ]);

        $car = Car::create($data);

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    public function update(Request $request, $id)
{
    $car = Car::find($id);

    if (!$car) {
        return redirect()->route('cars.index')->with('error', 'Car not found!');
    }

    $validator = Validator::make($request->all(), [
        'space_id' => 'required|exists:spaces,id',
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'isBeingMoved' => 'boolean',
    ]);

    if ($validator->fails()) {
            return redirect()
                        ->route('admin.edit.cars', ['id' => $car->vinNo])
                        ->withErrors($validator)
                        ->withInput();
        }
    
    if (Car::where('space_id', $request->space_id)->exists()) {
        return redirect()
                        ->route('admin.edit.cars', ['id' => $car->vinNo])
                        ->withErrors('There is already a car in that space')
                        ->withInput();
        }

    $car->space_id = $request->space_id;
    $car->make = $request->make;
    $car->model = $request->model;
    $car->year = $request->year;
    $car->isBeingMoved = $request->isBeingMoved;
    
    $car->save();

    return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found!');
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

    public function registerMove(Request $request, $id)
    {
        $car = Car::find($id);              //use id passed to post request to find car
        $car->isBeingMoved = 1;

        $car->save();

        return redirect('cars');
    }

    public function registerPark(Request $request, $id)    //retrieve list of empty spaces
    {
        $carId = $request->input('carId');
        $car = Car::find($carId);
        $spaces = Space::where('car_vinNo', '=' , NULL)->get();              
                                                                   
        return view("registerPark", ['car' => $car, 'spaces' => $spaces ]);
    }
    public function confirmPark(Request $request, $id)    //submit change to db
    {
        $carId = $request->input('carId');
        $newSpaceId = $request->input('spaceId');
        $car = Car::find($carId);
        $oldSpace = Space::find($car->space_id); 
        $newSpace = Space::find($id);

        $car->space_id = $newSpaceId;             //update space assigned to car
        $car->isBeingMoved = 0; 
        $oldSpace->car_vinNo = NULL;              //Mark old space as empty now
        $newSpace->car_vinNo = $carId;            //Assign car to new space

        $car->save();
        $oldSpace->save();
        $newSpace->save();

        return redirect("cars");
    }
}
