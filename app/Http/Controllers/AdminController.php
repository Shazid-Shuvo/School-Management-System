<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function AdminDashboard(Request $request) {
        $role = $request->header('role');

        if ($role == 'admin') {
            return view('admin.pages.dashboard-page');
        } else {
            return redirect('/');
        }
    }

    function TeacherPage(Request $request) {

        $role = $request->header('role');

        if ($role == 'admin') {
            return view('admin.pages.teacher-page');
        } else {
            return redirect('/');
        }
    }

    public function TeacherList(Request $request)
    {
        return User::where('role', '=', 'teacher')->get();
    }

    public function AddTeacher(Request $request)
    {
        $role = $request->header('role');

        // Debugging: Check if role header is received
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 400); // Bad Request if role is missing or incorrect
        }

        // Proceed with adding the teacher if role is admin
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($email);
        $role = 'teacher';

        $data = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        return ResponseHelper::out('success', $data, 200);
    }

    public function UpdateTeacher(Request $request)
    {
        $role = $request->header('role');

        // Check authorization
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 400);
        }

        // Retrieve and validate data
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');

        if (!$id || !$name || !$email) {
            return response()->json(['message' => 'Invalid input data'], 422); // 422 Unprocessable Entity for validation error
        }

        // Update user data
        $user = User::where('id', $id)->update([
            'email' => $email,
            'name' => $name
        ]);if($user){
            return response()->json(['message' => 'success'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function DeleteTeacher(Request $request)
    {
        $role = $request->header('role');

        // Check authorization
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401); // 401 for Unauthorized
        }

        // Retrieve and validate data
        $id = $request->input('id');

        if (!$id) {
            return response()->json(['message' => 'Invalid input data'], 422); // 422 for validation error
        }

        // Check if the user exists
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // 404 for Not Found
        }

        // Attempt to delete the user
        try {
            $user->delete();
            return response()->json(['message' => 'success'], 200); // Standardized 'success' message
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete user', 'error' => $e->getMessage()], 500); // 500 for server error
        }
    }

    public function StudentList(Request $request)
    {
        return User::where('role', '=', 'student')->get();
    }

    public function AddStudent(Request $request)
    {
        $role = $request->header('role');

        // Debugging: Check if role header is received
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 400); // Bad Request if role is missing or incorrect
        }

        // Proceed with adding the teacher if role is admin
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($email);
        $role = 'student';

        $data = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        return ResponseHelper::out('success', $data, 200);
    }

    public function UpdateStudent(Request $request)
    {
        $role = $request->header('role');

        // Check authorization
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 400);
        }

        // Retrieve and validate data
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');

        if (!$id || !$name || !$email) {
            return response()->json(['message' => 'Invalid input data'], 422); // 422 Unprocessable Entity for validation error
        }

        // Update user data
        $user = User::where('id', $id)->update([
            'email' => $email,
            'name' => $name
        ]);if($user){
        return response()->json(['message' => 'success'], 200);
    } else {
        return response()->json(['message' => 'User not found'], 404);
    }
    }

    public function DeleteStudent(Request $request)
    {
        $role = $request->header('role');

        // Check authorization
        if ($role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401); // 401 for Unauthorized
        }

        // Retrieve and validate data
        $id = $request->input('id');

        if (!$id) {
            return response()->json(['message' => 'Invalid input data'], 422); // 422 for validation error
        }

        // Check if the user exists
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // 404 for Not Found
        }

        // Attempt to delete the user
        try {
            $user->delete();
            return response()->json(['message' => 'success'], 200); // Standardized 'success' message
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete user', 'error' => $e->getMessage()], 500); // 500 for server error
        }
    }

}
