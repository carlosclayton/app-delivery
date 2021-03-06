<?php

namespace Delivery\Models;

use Delivery\Notifications\changeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Delivery\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Delivery\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new changeResetPassword($token));
    }

}
