<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $data = Users::all();
        return view('admin.user.index', compact('data'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.index', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $user = auth()->user();
        $userData = $request->except(['_token']);
        $user->fill($userData);
        $user->save();
        return redirect('user')->with('toast_success', 'Profile Updated Successfully!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        Users::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);
        return redirect('admin/user')->with('toast_success', 'User Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = Users::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('admin/user')->with('toast_success', 'User Updated Successfully!');
    }

    public function destroy($id)
    {
        $item = Users::findOrFail($id);
        $item->delete();
        return redirect('admin/user')->with('toast_success', 'User Deleted Successfully!');
    }
}
