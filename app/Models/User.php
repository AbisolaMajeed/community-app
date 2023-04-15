<?php

namespace App\Models;

use App\Models\Community;
use App\Models\UserWorkflow;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Events\User\UserAccountCreatedEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $with = ['community'];

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

    public function community()
    {
        return $this->hasOne(Community::class, 'id', 'community_id');
    }


    public function userWorkflow()
    {
        return $this->hasMany(UserWorkflow::class);
    }

    public static function boot()
    {
        static::created(function ($model) {
            UserAccountCreatedEvent::dispatch($model);
        });
        
        parent::boot();
    }
}
