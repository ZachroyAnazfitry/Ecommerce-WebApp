<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function customerPage()
    {
        return view('homepage.customer-main')->with('message', "You're logged in. Let's shopping!!");
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('warning', "You are logged out!");
    }

    public function customerRegister()
    {
        return view('homepage.customer-register');
    }

    public function customerProfile()
    {
       return view("homepage.customer-profile");
    }
}
