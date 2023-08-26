<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class AbstractService
{
    protected function getUserId(): ?int
    {
        return auth()->user()->getAuthIdentifier();
    }
}
