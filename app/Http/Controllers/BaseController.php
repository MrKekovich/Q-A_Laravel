<?php

namespace App\Http\Controllers;

use App\Service\BaseService;

class BaseController extends Controller
{
    public BaseService $service;
    public function __construct($service)
    {
        $this->service = $service;
    }
}
