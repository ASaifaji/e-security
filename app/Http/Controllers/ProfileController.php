<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function index($tab = 'profile')
    {
        $user = Auth::user();
        return view('profile.index', compact('user', 'tab'));
    }

    public function updatePersonalInfo(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('avatar')) {
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        if ($request->filled('avatar_remove')) {
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = null;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->back()->with('success', 'Personal information updated successfully.');
    }

    public function updatePassword(Request $request)

    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
