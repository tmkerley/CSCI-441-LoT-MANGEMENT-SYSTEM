<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\adminCarsDataTable;
use App\DataTables\adminSpacesDataTable;
use App\DataTables\adminUsersDataTable;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function index(adminCarsDataTable $dataTable)
    {
        return $dataTable->render('admin.cars');
    }

    public function getSpaces(adminSpacesDataTable $dataTable)
    {
        return $dataTable->render('admin.cars');
    }

    public function getUsers(adminUsersDataTable $dataTable)
    {
        return $dataTable->render('admin.cars');
    }




}
