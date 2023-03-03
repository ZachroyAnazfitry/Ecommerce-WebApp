<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    //

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', "You've succesfully logout");
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

    public function storeProfile(Request $request)
    {
        // need id
        $id = Auth::user()->id;
        // find who is login
        $admin = User::find($id);

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;

        // for file type image
        // if ($request->file('image')) {
        //     $image = $request->file('image');

        //     change image name
        //     $imageName = date(YMd).$file->getClientOriginalName();
        //     move file
        //     $imageName->move(public_path('upload/admin_images', $imageName));  #create new folder to store uploaded images
        //     $admin['image'] = $imageName;
        // }

        $admin->save();

        // toastr notifications
        // $noti = array(
        //     'message' => "Admin profile updated succesfully",
        //     'session' => 'success'
            
        // );

        return redirect()->route('admin.profile')->with('message', 'Admin profile updated succesfully');
    }

    
    function changePasswordProfile()
    {
        return view('admin.change-password');
    }

    public function updatePasswordProfile(Request $request)
    {
        // validation
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required | same:new_password',
        ]);

        $hashedPassword = Auth::user()->password;

        // check whether old password matched in DB
        if (Hash::check($request->old_password, $hashedPassword)) {
            // old password
            $users = User::find(Auth::id());

             // hash new password
            $users->password = bcrypt($request->new_password);
            $users->save();

            // session flash noti
            session()->flash('message', 'Password updated succesfully');

            // return to same page
            return redirect()->back();
        } else{
            session()->flash('error', 'Old password does not match!!');

            // return to same page
            return redirect()->back();
        }
    }
}
