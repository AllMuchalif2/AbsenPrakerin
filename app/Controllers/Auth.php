<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->auth_model = new Auth_model();

    }

    public function index()
    {
        
    }
}