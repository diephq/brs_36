<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface RequestInterface
{
    public function getAllOfRequest($requestId);
}
