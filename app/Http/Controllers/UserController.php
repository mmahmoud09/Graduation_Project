<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\table;

class UserController extends Controller
{
    public function index()
    {
       return User::all();
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $item->update($request->all());

        return $item;
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return 204;
    }
}
