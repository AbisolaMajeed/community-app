<?php

namespace App\Models;

use App\Models\Community;
use App\Models\UserWorkflow;
use App\Models\CommunityCountry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityWorkflow extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $with = ['workflowentries'];

    public function communityCountry()
    {
        return $this->belongsTo(CommunityCountry::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function workflowentries()
    {
        return $this->hasMany(CommunityWorkflowEntry::class);
    }
}
