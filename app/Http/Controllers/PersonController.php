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
      return Person::create($request->all());
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
