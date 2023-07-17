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
        $carId = $request->input('car');
        $car = Car::find($carId);
        $car->isBeingMoved = 1;

        $car->save();

        return redirect('cars');
    }

    public function registerPark(Request $request, $id)
    {
        $carId = $request->input('carId');
        $car = Car::find($carId);
        $spaces = Space::where('car_vinNo', '=' , NULL)->get();              //change old space to empty (NULL)          //update car to new space                 //unflag car as being moved
                                                                    //assign space to new car

        return view("registerPark", ['car' => $car, 'spaces' => $spaces ]);
    }
    public function confirmPark(Request $request, $id)
    {
        $carId = $request->input('carId');
        $newSpaceId = $request->input('spaceId');
        $car = Car::find($carId);
        $oldSpace = Space::find($carId); 
        $newSpace = Space::find($newSpaceId);

        $car->space_id = $newSpaceId;
        $oldSpace->car_vinNo = NULL;
        $newSpace->car_vinNo = $carId;

        $car->save();
        $oldSpace->save();
        $newSpace->save();

        return redirect("cars");
    }
}
