<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getAllExcept(int $userId): LengthAwarePaginator
    {
        return User::where('id', '!=', $userId)
            ->latest()
            ->paginate(10);
    }
}