<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
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
            // Generate JWT token
            $token = JWTToken::CreateToken($request->input('email'), $user->id, $user->role);

            // Set up the redirect URL based on user role
            $redirectUrl = match ($user->role) {
                'admin' => '/admin/dashboard',
                'teacher' => '/teacher/dashboard',
                'student' => '/student/dashboard',
                default => null,
            };

            if ($redirectUrl) {
                return response()
                    ->json(['redirect_url' => $redirectUrl], 200)
                    ->cookie('token', $token, 60 * 24 * 30);
            } else {
                return response()->json(['error' => 'Role not found'], 403);
            }
        }
        return response()->json(['error' => 'Invalid email or password'], 401);
    }

    function Logout(){
        return redirect('/')->cookie('token','',-1);
    }

}
