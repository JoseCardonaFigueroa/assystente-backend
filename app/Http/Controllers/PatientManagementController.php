<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Person;

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

    public function store(Request $request)
    {
      // var_dump($request->all());exit;
      $validator = \Validator::make($request->all(), [
        'persons.*.name' => 'string|required',
        'persons.*.name2' => 'string',
        'persons.*.last-name' => 'string|required',
        'persons.*.second-last-name' => 'string',
        'persons.*.gender' => 'string|max:1|required|min:1',
        'persons.*.curp' => 'string|max:18|min:18',
        'persons.*.marital-status' => 'string',
        'persons.*.profession' => 'string',
        'persons.*.birthdate' => 'date|required',
        'persons.*.address' => 'string',
        'persons.*.phone' => 'string',
        'persons.*.referred-by' => 'string'
      ]);

      if ($errors = $validator->errors()) {
        return \Response::json([
            'messages' => $errors
          ],400);
      }


      // var_dump($request); exit;
        return response()->json($request->all());
    }
}
