<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;

class PhoneController extends Controller
{
    //
    public function index()
    {
        return Phone::all();
    }

    public function show($id)
    {
        return Phone::findOrFail($id)->toJson();
    }

    public function store(Request $request)
    {
        return Phone::create($request->all())->toJson();
    }

    public function update(Request $request, $id)
    {
        $article = Phone::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Phone::findOrFail($id);
        $article->delete();

        return 204;
    }
}
