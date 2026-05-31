<?php

namespace App\Models;

use App\Enums\UserType;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Fuisic\Auth\Traits\HasFuisicAuth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laragear\WebAuthn\Contracts\WebAuthnAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, WebAuthnAuthenticatable
{
    use CrudTrait;
    use HasApiTokens;
    use HasFactory;
    use HasFuisicAuth;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'user_type' => UserType::class,
        ];
    }
}
