<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

    // Calculate the starting serial number for the pagination
    $serialNumber = ($users->currentPage() - 1) * $users->perPage() + 1;

    return view('users.index', compact('users', 'serialNumber'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|unique:users',
            //'phone' => 'required | numeric|unique:employees,phone,'.$employee->id.'',

            'email' => 'required|email|unique:users|max:255',
            'password' => 'nullable|min:6',
            'gender' => 'required|string',
            'mother_tongue' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'gender' => $request->input('gender'),
            'mother_tongue' => $request->input('mother_tongue'),
        ]);

        // dd('success');

        return redirect()->route('users.index')
        ->withSuccess('User created successfully');
    }


    public function view(User $user){
        return view('users.view', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|numeric|unique:users,phone_number,' . $user->id ,
        'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
         'password' => 'required|string|min:6',
        'gender' => 'required|string',
        'mother_tongue' => 'required|string|max:255',
    ]);

    $user->update($validatedData);

    return redirect()->route('users.index')
    ->withSuccess('User details updated successfully');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
        ->withSuccess('User details deleted successfully');
    }
}
