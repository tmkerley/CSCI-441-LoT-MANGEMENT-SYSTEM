<?php

namespace App\Http\Controllers;

use App\DataTables\CarsDataTable;
use App\Models\Space;
use Illuminate\Http\Request;
use App\Models\Car;
use Yajra\DataTables\DataTables;

class CarController extends Controller
{
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('cars.index');
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
        $oldSpace->car_vinNo = NULL;              //Mark old space as empty now
        $newSpace->car_vinNo = $carId;            //Assign car to new space

        $car->save();
        $oldSpace->save();
        $newSpace->save();

        return redirect("cars");
    }
}
