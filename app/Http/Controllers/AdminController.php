<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;



class AdminController extends Controller
{
    //

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // for user profile setting
    public function profile()
    {
        
        // get user id who is currently login(authenticated)
        $id = Auth::user()->id;
        // find who is login
        $admin = User::find($id);

        return view('admin.admin-profile', compact('admin'));

    }

    public function editProfile()
    {
        // edit admin profile

        $id = Auth::user()->id;
        // find who is login
        $admin = User::find($id);

        return view('admin.admin-edit-profile', compact('admin'));

    }
}
