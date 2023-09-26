<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members.index', [
            'titleHeader' => 'List Member',
            'users' => User::where('is_admin', 0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create', [
            'titleHeader' => 'Create Member',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'phone' => ['required'],
            'password' => ['required'],
        ]);

        $validateData['password'] = Hash::make($request->password);

        $user = User::create($validateData);

        return redirect()->route('members.index')->with('success', 'Add new member successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('members.edit', [
            'titleHeader' => 'Edit Member',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            return redirect()->route('members.index')->with('error', 'Member Deleted');
        }

        return redirect()->route('members.index')->with('error', 'Member Deleted Failed !');
    }
}
