<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginView()
    {
        $user = Auth::User();
        if ($user) {
            return redirect()->route('dashboard');
        }
        return view("login");
    }

    public function registerView()
    {
        $user = Auth::User();
        if ($user) {
            return redirect()->route('dashboard');
        }
        return view("register");
    }

    public function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);
        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator);
        } else {

            if (Auth::attempt($request->only(["email", "password"]))) {
                return redirect("dashboard");
            } else {
                return back()->withErrors("Invalid credentials");
            }
        }
    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',

        ]);
        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator);
        } else {

            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->save();
            Auth::login($User);
            return redirect("dashboard");
        }
    }

    public function dashboard()
    {
        $user = Auth::User();
        if (!$user) {
            return redirect()->route('login');
        }
        return view("dashboard");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("login");
    }

    public function upload(Request $request){

        $validator = Validator::make($request->all(), [
            'select' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator);
        } else {

            $data = new image;
            $data->num= $request->select;
            if($request->file('image'))
            {
                $file= $request->file('image');
                $filename=date('Y-m-d').$file->getClientOriginalName();
                $file->move(public_path('C:\xampp\htdocs\Admin\public\image'),$filename);
                $data['image']=$filename;
            }
            $User->save();
            return redirect("gallery");
        }
    }
}
