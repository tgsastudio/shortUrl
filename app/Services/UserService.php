<?php

namespace App\Services;

use App\Models\User;

/**
 * Class UrlService
 * @package App\Services
 */
class UserService
{

    public function register($name, $email, $password): bool
    {
        // find if exists
        $exists = User::whereEmail($email)->first();
        if ($exists) {
            throw new \Exception('User already exists');
        }

        $now = date('Y-m-d H:i:s');

        return User::insert([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
