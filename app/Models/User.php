<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'father_name',
        'first_name',
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getNameRole($id)
    {
        $role = '';
        switch ($id) {
            case 1:
                $role = 'Администратор';
                break;
            case 2:
                $role = 'Врач';
                break;
            case 3:
                $role = 'Клиент';
                break;
        }
        return $role;
    }

    public static function getRoles()
    {
        return
            [
                (object)[
                    'id' => 1,
                    'name' => 'Администратор'
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Врач'
                ],
                (object)[
                    'id' => 3,
                    'name' => 'Клиент'
                ]
            ];
    }

    private static function getIdRole($name)
    {
        $id = '';
        switch ($name) {
            case 'Администратор' :
            case 'admin':
                $id = 1;
                break;
            case 'Врач':
            case 'doctor':
                $id = 2;
                break;
            case 'Клиент':
            case 'client':
                $id = 3;
                break;
        }
        return $id;
    }

    public function hasRole($name)
    {
        if ($this->role === $this->getIdRole($name)) {
            return true;
        }
        return false;
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
