<?php

namespace App\Models;

use App\Models\CommunityAdmin;
use App\Models\CommunityCountry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $with = ['communityCountry'];

    public static function byId($id)
    {
        return Self::find($id);
    }

    public function communityAdmin()
    {
        return $this->belongsToMany(CommunityAdmin::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function communityCountry()
    {
        return $this->hasMany(CommunityCountry::class);
    }
}
