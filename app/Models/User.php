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
        'id',
        'name',
        'email',
        'password',
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

    public static function getById(int $id){
        $users = collect();

        $users->push(
            new User([
                'id' => 1,
                'email' => 'admin@example.org',
            ]),
            new User([
                'id' => 2,
                'email' => 'admin2@example.org',
            ]),
            new User([
                'id' => 3,
                'email' => 'user@example.org',
            ]),
            new User([
                'id' => 4,
                'email' => 'user2@example.org',
            ]),
        );


        return $users->firstWhere('id', $id);
    }
}
