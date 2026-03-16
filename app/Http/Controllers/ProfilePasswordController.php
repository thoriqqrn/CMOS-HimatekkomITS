<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfilePasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request)
    {
        $user = $request->user();

        $user->forceFill([
            'password' => Hash::make($request->string('password')),
            'remember_token' => Str::random(60),
        ])->save();

        // Invalidate other browser sessions for this user.
        Auth::logoutOtherDevices($request->string('password'));

        // Optional for API apps using Sanctum/Passport:
        // $user->tokens()->delete();

        // Optional: dispatch notification/audit event here.

        return back()->with('status', 'password-updated');
    }
}
