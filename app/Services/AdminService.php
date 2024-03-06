<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function create(array $data)
    {
        $data['password'] = Hash::make($data['phone']);
        return Admin::create($data);
    }

    public function update(Admin $admin, array $data)
    {
        $admin->update($data);
        return $admin;
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
    }
}
