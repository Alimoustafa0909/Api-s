<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
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
