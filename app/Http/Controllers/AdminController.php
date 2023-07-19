<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return $dataTable->render('admin.cars');
    }

    public function getSpaces(SpacesDataTable $dataTable)
    {
        return $dataTable->render('admin.spaces');
    }

    public function getUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users');
    }




}
