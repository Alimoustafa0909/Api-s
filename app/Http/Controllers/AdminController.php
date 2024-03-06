<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
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

    public function store(AdminStoreRequest $request)
    {
        $attributes = $request->validated();
        $admin = $this->adminService->create($attributes);
        return new AdminResource($admin);
    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $attributes = $request->validated();
        $admin = $this->adminService->update($admin, $attributes);
        return new AdminResource($admin);
    }

    public function destroy(Admin $admin)
    {
        $this->adminService->delete($admin);
        return response()->noContent();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->noContent();
    }
}
