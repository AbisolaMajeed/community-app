<?php

namespace App\Rules;

use App\Models\CommunityCountry;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CountryIsUniqueForCommunity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        CommunityCountry::where('community_id', Auth::user()->community_id)
                            ->where($attribute, $value)
                            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
