<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Community;
use App\Models\CommunityWorkflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityCountry extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $with = ['communityWorkflow'];

    public function community()
    {
        return $this->hasOne(Community::class, 'id', 'community_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function communityWorkflow()
    {
        return $this->hasMany(CommunityWorkflow::class);
    }
}
