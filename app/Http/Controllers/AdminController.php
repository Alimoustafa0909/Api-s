<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Resources\AdminResource;
use App\Services\AdminServiceInterface;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admins = $this->adminService->all();
        return AdminResource::collection($admins);
    }

    public function show(int $id)
    {
        $admin = $this->adminService->findId($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        return new AdminResource($admin);
    }

    public function store(AdminStoreRequest $request)
    {
        $attributes = $request->validated();
        $admin = $this->adminService->create($attributes);
        return new AdminResource($admin);
    }

    public function update(AdminUpdateRequest $request, int $id)
    {
        $admin = $this->adminService->findId($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $attributes = $request->validated();
        $admin = $this->adminService->update($admin, $attributes);
        return new AdminResource($admin);
    }

    public function destroy(int $id)
    {
        $admin = $this->adminService->findId($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $this->adminService->delete($admin);
        return response()->noContent();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->noContent();
    }
}
