<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService implements AdminServiceInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return Admin::all();
    }

    public function findId(int $id): ?Admin
    {
        return Admin::find($id);
    }

    public function create(array $data): Admin
    {
        $data['password'] = Hash::make($data['phone']);
        return Admin::create($data);
    }

    public function update(Admin $admin, array $data): Admin
    {
        $admin->update($data);
        return $admin;
    }

    public function delete(Admin $admin): void
    {
        $admin->delete();
    }
}
