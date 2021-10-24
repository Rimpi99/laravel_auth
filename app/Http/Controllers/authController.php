<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            "email" => ["required", "string", "email"],
            "password" => ["required", "string", "min:6"]
        ];
        $valid = $request->validate($rules);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return redirect("/");
        } else {
            return back()->with("fail", "Invalid User");
        }
    }





    public function register(Request $request)
    {
        $rules = [
            "name" => ["required", "string", "min:3"],
            "email" => ["required", "string", "email", "unique:users"],
            "password" => ["required", "string", "min:6"]
        ];
        $valid = $request->validate($rules);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with("success", "Registered Successfuly");
        } else {
            return back()->with("fail", "Couldn't register the User");
        }
    }

    public function dashboard()
    {

        if (Auth::check()) {
            $user = Auth::user();
            $tasks = task::where("user_id", "=", $user['id'])->get();
            // return dd($tasks);
            return view("dashboard")->with("user", $user)->with("tasks", $tasks);
        } else {
            return redirect("/login");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
