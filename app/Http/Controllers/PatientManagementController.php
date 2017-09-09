<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class PatientManagementController extends Controller
{
    //
    public function index()
    {
        // $response['appointments'] = Appointment::limit(2)->get();
        $response['appointments'] = Appointment::all();

        foreach ($response['appointments'] as $k => $a) {
          $response['appointments'][$k]['person'] = $a->person;
          // $response['appointments'][$k]['phone'] = $a->phone;
          $response['appointments'][$k]['disease'] = $a->disease;
        }

        return response()->json($response);
    }

    public function get($id)
    {
      $response['appointments'] = Appointment::findOrFail($id);

      $response['appointments'][$k]['person'] = $a->person;
      // $response['appointments'][$k]['phone'] = $a->phone;
      $response['appointments'][$k]['disease'] = $a->disease;

      return response()->json($response);
    }
}
