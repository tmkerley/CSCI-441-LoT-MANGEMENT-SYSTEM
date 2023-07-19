<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\adminCarsDataTable;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function index(adminCarsDataTable $dataTable)
    {
        return $dataTable->render('admin.cars');
    }
}
