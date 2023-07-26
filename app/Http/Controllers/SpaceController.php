<?php

namespace App\Http\Controllers;


use App\Models\Space;
use App\Models\Car;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\DataTables\SpacesDataTable;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
   public function create(Request $request)
   {

    $validator = Validator::make($request->all(),[
        'latitude' => 'required|numeric|min:-90|max:90',
        'longitude' => 'required|numeric|min:0|max:180'
    ]);

    if ($validator->fails()) {
            return redirect()
                        ->route('admin.create.space')
                        ->withErrors($validator)
                        ->withInput();
        }

    $space = new Space;
    $space->latitude = $request->latitude;
    $space->longitude = $request->longitude;
    $space->save();
    return redirect()->route('admin.spaces')->with('success', 'Space created successfully!');
   }

   public function show($id)
   {
    $space = Space::find($id);

    if (!$space) {
        return redirect()->route('spaces.index')->with('error', 'Space not found!');
    }

    return view('spaces.show', ['space' => $space]);
   }

   public function update(Request $request, $id)
   {
    $space = Space::find($id);

    if (!$space) {
        return redirect()->route('admin.spaces')->with('error', 'Car not found!');
    }

    $validator = Validator::make($request->all(), [
        'car_vinNo' => 'nullable|exists:cars,id', // Make sure the car_id exists in the cars table
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    if ($validator->fails()) {
            return redirect()
                        ->route('admin.edit.spaces', ['id' => $space->space_id])
                        ->withErrors($validator)
                        ->withInput();
        }

    $space->car_vinNo = $request->car_vinNo;
    $space->latitude = $request->latitude;
    $space->longitude = $request->longitude;

    if ($space->car_vinNo == null) {
        $space->status = 0;
    }
    
    $space->save();

    return redirect()->route('admin.spaces')->with('success', 'Space updated successfully!');
    
   }

   public function destroy($id)
   {
    $space = Space::find($id);

    if (!$space) {
        return redirect()->route('spaces.index')->with('error', 'Space not found!');
    }

    $space->delete();

    return redirect()->route('spaces.index')->with('success', 'Space deleted successfully!');
   }

}
