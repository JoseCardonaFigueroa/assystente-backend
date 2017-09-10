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
      $validator = \Validator::make($request->all(), [
        'persons.*.name' => 'alpha|required',
        'persons.*.name2' => 'alpha|nullable',
        'persons.*.last-name' => 'alpha|required',
        'persons.*.second-last-name' => 'alpha|nullable',
        'persons.*.gender' => 'alpha|max:1|required|min:1',
        'persons.*.curp' => 'alpha_num|max:18|min:18|nullable',
        'persons.*.marital-status' => 'alpha|nullable',
        'persons.*.profession' => 'string|nullable',
        'persons.*.birthdate' => 'date|required',
        'persons.*.address' => 'string|nullable',
        'persons.*.phone' => 'string|nullable',
        'persons.*.title' => 'alpha|nullable',
        'persons.*.referred-by' => 'alpha|nullable',
        
      ]);

      if (count($errors = $validator->errors())) {
        return \Response::json([
          'messages' => $errors
        ],400);
      }

      $persons = [];

      try {
        foreach ($request->all()['persons'] as $r) {
          $p = new Person($r);
          $p->save();
          $persons [] = $p;
        }
      } catch (Exception $e) {
        return \Response::json([
          'messages' => 'Algo salió mal al momento de insertar los datos'
        ], 400);
      }

      return response()->json($persons);
    }
}
