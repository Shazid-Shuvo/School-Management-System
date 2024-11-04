<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  function LoginPage(){
    return view('auth.pages.login-page');
  }

    public function LoginForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed'], 422);
        }

        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            switch ($user->role) {
                case 'admin':
                    return response()->json(['redirect_url' => '/admin/dashboard'], 200);
                case 'teacher':
                    return response()->json(['redirect_url' => '/teacher/dashboard'], 200);
                case 'student':
                    return response()->json(['redirect_url' => '/student/dashboard'], 200);
                default:
                    return response()->json(['error' => 'Role not found'], 403);
            }
        }

        return response()->json(['error' => 'Invalid email or password'], 401);
    }




}
