<?php

namespace App\Http\Controllers\Candidate;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('candidate.changePassword.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'required',
                'confirmPassword' => 'required'
            ],
            [
                'oldPassword.required' => 'The old password field is required!',
                'newPassword.required' => 'The new password field is required!',
                'confirmPassword.required' => 'The confirm password field is required!',
            ]
        );

        $user = User::findOrFail($request->id);
        if (Hash::check($request->oldPassword, $user->password)) {
            if ($request->oldPassword != $request->newPassword) {
                if ($request->newPassword == $request->confirmPassword) {
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    return redirect()->back()->with('success', 'Password changed successfully!');
                } else {
                    return redirect()->back()->with('delete', 'Confirm password not matched with new password!');
                }
            } else {
                return redirect()->back()->with('delete', 'New Password cannot be same as old password!');
            }
        } else {
            return redirect()->back()->with('delete', 'Old password not matched with stored password!');
        }

    }
}
