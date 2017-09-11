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

    public function show($id)
    {
      $response['appointments'] = Appointment::findOrFail($id);

      $response['appointments']['person'] = $response['appointments']->person;
      // $response['appointments'][$k]['phone'] = $response['appointments']->phone;
      $response['appointments']['disease'] = $response['appointments']->disease;

      return response()->json(
        ['messages' => [
          'Los datos fueron extraídos de manera correcta',
        ],
        'data'=> $response,]
      );
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
        'persons.*.appointments.*.appointment-date' => 'date|required',
        'persons.*.appointments.*.observations' => 'string|nullable',
        'persons.*.appointments.*.disease_id' => 'numeric|required',
      ]);

      // var_dump($request->all()); exit;
      $requestArr = $request->all();
      if(count($requestArr) == 0 || !array_key_exists('persons', $requestArr)){
        return \Response::json([
          'messages' => ['Por favor introduzca los datos de la cita y la persona.'],
          'data' => [],
        ],400);
      }

      if (count($errors = $validator->errors())) {
        return \Response::json([
          'messages' => $errors,
          'data' => [],
        ],400);
      }

      $data = [];
      $data['persons'] = [];

      try {
        foreach ($requestArr['persons'] as $k => $r) {
          $p = new Person($r);
          $p->save();
          // var_dump($p);exit;

          $data ['persons'][$k] = $p;

          foreach ($r['appointments'] as $aRequest) {
            $a = new Appointment($aRequest);
            $a->person_id = $p->id;
            $a->save();
            $data ['persons'][$k]['appointments'][] = $a;
          }
        }

      } catch (Exception $e) {
        return \Response::json([
          'messages' => ['Algo salió mal al momento de insertar los datos'],
          'data' => [],
        ], 500);
      }

      return response()->json([
        'messages' => 'El paciente y la cita fueron creados correctamente.',
        'data' => $data
       ]);
    }

    public function destroy($id)
    {

      try {

        $deletedAppointment = Appointment::onlyTrashed()->where('id', $id)->get();
        if($deletedAppointment->count() > 0){
          return \Response::json([
            'messages' => ['La cita ya había sido eliminada'],
            'data' => [],
          ], 404);
        }

        Appointment::destroy([$id]);
        $deletedAppointment = Appointment::onlyTrashed()->where('id', $id)->get();
        // $deletedAppointments = Appointment::onlyTrashed()->where('id', $id)->get();
          return \Response::json([
            'messages' => ['La cita se eliminó correctamente'],
            'data' => ['appointments' => $deletedAppointment],
          ]);

      } catch (Exception $e) {
        return \Response::json([
          'messages' => ['Algo salió mal al momento de eliminar los datos'],
          'data' => [],
        ], 500);
      }

    }
}
