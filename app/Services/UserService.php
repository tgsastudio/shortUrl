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

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        return User::insert([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);
    }
}
