<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Space;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\adminCarsDataTable;
use App\DataTables\SpacesDataTable;
use App\DataTables\UsersDataTable;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function getCars(adminCarsDataTable $dataTable)
    {
        return $dataTable->render('admin.cars.cars');
    }

    public function getSpaces(SpacesDataTable $dataTable)
    {
        return $dataTable->render('admin.spaces.spaces');
    }

    public function getUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users');
    }

    public function registerMove(Request $request, $id)
    {
        $car = Car::find($id);              //use id passed to post request to find car
        $car->isBeingMoved = 1;

        $car->save();

        return redirect('admin/cars');
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

        $car->space_id = $newSpaceId;           //update space assigned to car
        $car->isBeingMoved = 0; 
        $oldSpace->car_vinNo = NULL; 
        $oldSpace->status = 0;                  //Mark old space as empty now
        $newSpace->car_vinNo = $carId; 
        $newSpace->status = 1;                  //Assign car to new space

        $car->save();
        $oldSpace->save();
        $newSpace->save();

        return redirect("admin/cars");
    }

    public function editCar(Request $request, $id)
    {
        
        $car = Car::find($id);              

        return view('admin.edit.car',['data' => $car ] );
    }

    public function editSpace(Request $request, $id)
    {
        
        $space = Space::find($id);              

        return view('admin.edit.space',['data' => $space ] );
    }

    public function editUser(Request $request, $id)
    {
        
        $user = User::find($id);              

        return view('admin.edit.user',['data' => $user ] );
    }

    public function createSpace(Request $request)
    {            
        return view('admin.spaces.create');
    }

    public function createCar(Request $request)
    {            
        return view('admin.cars.create');
    }
}
