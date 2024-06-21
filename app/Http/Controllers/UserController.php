<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        \App\Models\User::create($data);
        return redirect()->route('user.index')->with('success', 'User successfully created');
    }

    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $users = \App\Models\User::all(); // Jika Anda perlu daftar semua pengguna
        return view('pages.users.edit', compact('user', 'users'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();
        $user = \App\Models\User::findOrFail($id); // Fetch the user model
        $user->update($data); // Update the user model with the validated data

        return redirect()->route('user.index')->with('success', 'User successfully updated');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id); // Fetch the user model using the ID
        $user->delete(); // Delete the user model

        return redirect()->route('user.index')->with('success', 'User successfully deleted');
    }

}
