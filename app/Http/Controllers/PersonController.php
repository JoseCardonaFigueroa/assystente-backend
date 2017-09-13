<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
  public function index()
  {
      if(!Person::all()->first()){
        return \Response::json([
          'messages' => [
            'No se encontraron pacientes.',
          ],
          'data' => []
        ]);
      }

      $response['persons'] = Person::all();
      $tempArr = [];
      foreach ($response['persons'] as $k => $p) {
        $response['persons'][$k]['appointments'] = $p->appointments;
      }

      return response()->json([
        'messgaes' => [
          'Los datos fueron extraídos exitosamente.',
        ],
        'data'=> $response,
      ]);
  }

  public function show($id)
  {
    $response['person'] = Person::findOrFail($id);
    $response['person']['appointments'] = $response['person']->appointments;
    return response()->json([
      'messgaes' => [
        'Los datos fueron extraídos exitosamente.',
      ],
      'data'=> $response,
    ]);
  }

  public function store(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'persons.*.name' => 'alpha|required',
      'persons.*.name2' => 'alpha|nullable',
      'persons.*.last-name' => 'string|required',
      'persons.*.second-last-name' => 'string|nullable',
      'persons.*.gender' => 'alpha|max:1|required|min:1',
      'persons.*.curp' => 'string|max:18|min:18|nullable',
      'persons.*.marital-status' => 'alpha|nullable',
      'persons.*.profession' => 'string|nullable',
      'persons.*.birthdate' => 'date|required',
      'persons.*.address' => 'string|nullable',
      'persons.*.phone' => 'string|nullable',
      'persons.*.referred-by' => 'string|nullable'
    ]);
    if (count($errors = $validator->errors())) {
      return \Response::json([
        'messages' => $errors,
        'data' => [],
      ],400);
    }

    $data = [];
    $data['persons'] = [];

    $requestArr = $request->all();
    try {
      foreach ($requestArr['persons'] as $k => $r) {
        $p = new Person($r);
        $p->save();

        $data ['persons'][$k] = $p;

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

  public function update(Request $request, $id)
  {
      $article = Person::findOrFail($id);
      $article->update($request->all());

      return $article;
  }

  public function destroy(Request $request, $id)
  {
      $article = Person::findOrFail($id);
      $article->delete();

      return 204;
  }
}
