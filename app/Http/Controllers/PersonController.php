<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
  public function index()
  {
      return Person::all();
  }

  public function show($id)
  {
      return Person::findOrFail($id)->toJson();
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
