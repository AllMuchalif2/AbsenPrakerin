<?php
namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model

{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role'];

    public function cekLogin($username)
    {
        return $this->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }

        return null;
    }
} 