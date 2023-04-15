<?php

namespace App\Models;

use App\Models\Community;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\Community\CommunityAdminCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityAdmin extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;
    protected $guarded = [];
    protected $hidden = ['password'];

    public function community()
    {
        return $this->hasOne(Community::class, 'id', 'community_id');
    }

    public static function boot()
    {
        static::created(function ($model) {
            // CommunityAdminCreatedEvent::dispatch($model);
        });
        
        parent::boot();
    }
}
