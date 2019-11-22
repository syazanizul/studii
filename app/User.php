<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Auth;

class User extends Authenticatable
{
    use Notifiable;

    public function role_name() {
        $role = Auth::user() -> role;

        switch ($role)  {
            case 1:
                $role_name = 'student';
                break;
            case 2:
                $role_name = 'teacher';
                break;
            case 3:
                $role_name = 'parent';
                break;
            case 4:
                $role_name = 'volunteer';
                break;
        }

        return $role_name;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
