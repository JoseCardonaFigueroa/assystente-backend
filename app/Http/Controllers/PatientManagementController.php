<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientManagementController extends Controller
{
    //
    public function index()
    {
        return Person::all();
    }
}
