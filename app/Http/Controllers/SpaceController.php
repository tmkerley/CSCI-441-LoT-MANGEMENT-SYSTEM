<?php

namespace App\Http\Controllers;


use App\Models\Space;
use App\Models\Car;
use Yajra\DataTables\DataTables;
use App\DataTables\SpacesDataTable;
use Illuminate\Http\Request;

class SpaceController extends Controller
{


   public function index(SpacesDataTable $dataTable)
    {
        return $dataTable->render('spaces.index');
    }

   public function create(Request $request)
   {
    $data = $request->validate([
        'car_id' => 'nullable|exists:cars,id', // Make sure the car_id exists in the cars table
        'status' => 'required|boolean',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $space = Space::create($data);

    return redirect()->route('spaces.index')->with('success', 'Space created successfully!');
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
        return redirect()->route('spaces.index')->with('error', 'Space not found!');
    }

    $data = $request->validate([
        'car_id' => 'nullable|exists:cars,id', // Make sure the car_id exists in the cars table
        'status' => 'required|boolean',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $space->update($data);

    return redirect()->route('spaces.index')->with('success', 'Space updated successfully!');
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
