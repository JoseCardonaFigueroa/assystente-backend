<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
  public function index()
  {
      $response['persons'] = Person::all();
      $tempArr = [];
      foreach ($response['persons'] as $k => $p) {
        $response['persons'][$k]['appointments'] = $p->appointments;
      }

      return response()->json($response);
  }

  public function show($id)
  {
    $response['person'] = Person::findOrFail($id);
    $response['person']['appointments'] = $response['person']->appointments;
    return response()->json($response);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
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
      return response()->json(Person::create($request->all()));
  }

  public function update(Request $request, $id)
  {
      $article = Person::findOrFail($id);
      $article->update($request->all());

      return $article;
  }

  public function delete(Request $request, $id)
  {
      $article = Person::findOrFail($id);
      $article->delete();

      return 204;
  }
}
