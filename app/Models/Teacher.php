<?php

namespace App\Models;

/**
 * @property-read 'Profesor' $role
 */
class Teacher extends User
{
    protected $table = 'users';

    protected $attributes = [
        'role' => 'Profesor',
    ];

    static function all($columns = ['*'])
    {
        return self::where('role', 'Profesor')->get($columns);
    }
}
