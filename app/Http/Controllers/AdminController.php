<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createProvider()
    {
        // Assuming you have a view called 'admin.create-provider'
        // and a list of services to choose from
        $services = Service::all();
        return view('admin.create-provider', compact('services'));
    }

    /**
     * Store a newly created provider in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProvider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Assuming the currently authenticated admin is adding the provider
        $admin = auth()->user();

        $provider = new Provider();
        $provider->name = $request->input('name');
        $provider->service_id = $request->input('service_id');
        $provider->admin_id = $admin->id;
        $provider->save();

        return redirect()->route('admin.providers.index')->with('success', 'Provider created successfully.');
    }
}
