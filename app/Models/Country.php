<?php

namespace App\Models;

use App\Models\CommunityCountry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name'];

    public function communityCountry()
    {
        return $this->belongsTo(CommunityCountry::class, 'id', 'country_id');
    }
}
