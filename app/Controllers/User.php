<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function dashboard()
    {
        return view('user/dashboard'); // Sesuaikan dengan nama file view Anda
    }
}