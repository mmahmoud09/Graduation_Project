<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return Provider::all();
    }

    public function store(Request $request)
    {
        return Provider::create($request->all());
    }

    public function show($id)
    {
        return Provider::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $item = Provider::findOrFail($id);
        $item->update($request->all());

        return $item;
    }

    public function destroy($id)
    {
        $item = Provider::findOrFail($id);
        $item->delete();

        return 204;
    }
}
