<?php

namespace App\Models;

use App\Models\UserWorkflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityWorkflowEntry extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function communityworkflow()
    {
        return $this->belongsTo(communityworkflow::class);
    }
}
