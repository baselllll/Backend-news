<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function registerUser(array $data){
        $data['password'] = bcrypt($data['password']);
        $data['data_source_api'] = $data['data_source_api'];
        return User::create($data);
    }

    public function LoginUser($data){
        if (!Auth::attempt($data)) {
            return 'not valid';
        }
        return User::where('email', $data['email'])->firstOrFail();

    }
}
