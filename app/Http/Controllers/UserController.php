<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showadminprofile()
    {
        $u = User::find(Auth::user()->id);

        return view('profileadmin', compact('u'));
    }
    public function showmemberprofile()
    {
        $u = User::find(Auth::user()->id);

        return view('profilemember', compact('u'));
    }
    public function updatepasswordadmin(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new PasswordChange],
            'new_password' => ['required', 'min:5', 'max:20'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/admin/admin-profile')->with('success', 'Password Change Success!');
    }
    public function updatepasswordmember(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new PasswordChange],
            'new_password' => ['required', 'min:5', 'max:20'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/member/member-profile')->with('success', 'Password Change Success!');
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:13|',
            'address' => 'required|min:5'
        ]);

        $u = User::find(Auth::user()->id);
        $u->username = $request['username'];
        $u->email = $request['email'];
        $u->phone = $request['phone'];
        $u->address = $request['address'];
        $u->save();
        return redirect('/member/member-profile')->with('success', 'Profile Change Success!');
    }
}
