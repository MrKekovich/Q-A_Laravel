<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public $service;
    public function __construct($service)
    {
        $this->service = $service;
    }
}
