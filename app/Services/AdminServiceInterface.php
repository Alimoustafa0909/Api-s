<?php

namespace App\Services;

use App\Models\Admin;

interface AdminServiceInterface
{
    public function index(): \Illuminate\Support\Collection;
    public function show(int $id): ?Admin;

    public function create(array $data): Admin;
    public function update(Admin $admin, array $data): Admin;
    public function delete(Admin $admin): void;
}
