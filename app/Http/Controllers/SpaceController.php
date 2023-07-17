<?php

namespace App\Http\Controllers;


use App\Models\Space;
use App\Models\Car;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
   
    public function updateSpace(Request $request,$id) {
      $newSpaceId = $request->input('emptySpaces');
      $carId = $request->input('car');
      $car = Car::find($carId);
      $newSpace = Space::find($newSpaceId);
      $oldSpace= Space::find($car->space_id);
      $oldSpace->car_vinNo = NULL;
      $oldSpace->status = 0;                   //change old space to empty (NULL)
      $car->space_id = $newSpaceId;            //update car to new space
      $car->isBeingMoved = 0;                  //unflag car as being moved
      
      $newSpace->car_vinNo = $car->vinNo; 
      $newSpace->status = 1;                  //assign space to new car

      $car->save();
      $newSpace->save();
      $oldSpace->save();
      return redirect("/cars");
   }
}
