<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            $admin = Auth::guard('admin')->user();
            $token = $admin->createToken('AdminToken')->plainTextToken;

            return response()->json(['token' => $token], 200);
        } else {
            // Authentication failed...
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function index()
    {
        $admins = Admin::all();
        return AdminResource::collection($admins);
    }

    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'unique:admins'],
            'email' => ['required', 'unique:admins'],
        ]);

        $attributes['password'] = Hash::make($attributes['phone']);

        $admin = Admin::create($attributes);

        return new AdminResource($admin);
    }

    public function update(Admin $admin, Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'unique:admins,phone,' . $admin->id],
            'email' => ['required', 'unique:admins,email,' . $admin->id, 'email'],
        ]);

        $admin->update($attributes);

        return new AdminResource($admin);
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->noContent();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->noContent();
    }
}
