<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        return Service::create($request->all());
    }

    public function show($id)
    {
        return Service::findOrFail($id)->providers;

    }

    public function update(Request $request, $id)
    {
        $item = Service::findOrFail($id);
        $item->update($request->all());

        return $item;
    }

    public function destroy($id)
    {
        $item = Service::findOrFail($id);
        $item->delete();

        return 204;
    }
}
