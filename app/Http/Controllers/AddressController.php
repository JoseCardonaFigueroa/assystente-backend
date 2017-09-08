<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{

    //

    public function index()
    {
        return Address::all();
    }

    public function show($id)
    {
        return Address::findOrFail($id)->toJson();
    }

    public function store(Request $request)
    {
        return Address::create($request->all())->toJson();
    }

    public function update(Request $request, $id)
    {
        $article = Address::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Address::findOrFail($id);
        $article->delete();

        return 204;
    }
}
