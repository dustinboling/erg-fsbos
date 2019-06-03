<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return redirect(route('users.edit', auth()->user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (! isset($user->id) ) $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'min:2',
            'phone' => 'min:10',
            'email' => 'email'
        ]);

        $user->name = request('name');
        $user->phone = request('phone');
        $user->email = request('email');
        if(null !== request('password')) {
            request()->validate(['password' => 'min:8']);
            $user->password = Hash::make(request('password'));
        }
        $user->save();

        return back()->with(['status' => 'Your account information has been updated!']);
    }
}
