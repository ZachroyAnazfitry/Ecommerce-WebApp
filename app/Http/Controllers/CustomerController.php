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
        return view('frontend.main');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('')->with('message', "You've succesfully logout");
    }

    public function customerRegister()
    {
        return view('frontend.customer-register');
    }
}
