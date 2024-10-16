<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('profile.mypost', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function index()
    {
        return view('profile.index');
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email != Auth::user()->email) {
            $validatedData =  $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        $file = $request->file('avatar');
        if ($file) {
            if ($request->hasFile('avatar')) {
                $validatedData['avatar'] = $request->name . '-' .time() . '.' . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->storeAs('user', $validatedData['avatar'], 'public');
            }
        } 

        $user = $user->update($validatedData);

        if ($user) {
            return redirect()->route('profile')->with('success', 'User updated successfully!');
        } else {
            return redirect()->route('profile')->with('error', 'Failed to update user!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function changePassword()
    {
        return view('profile.editPassword');
    }

    public function updatePassword(User $user, Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'current_password:web'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $user = $user->update([
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            return redirect()->route('profile')->with('error', 'Failed to update password!');
        } else {
            return redirect()->route('profile')->with('success', 'Password updated successfully!');
        }
    }
}
