<?php

namespace Torralbodavid\IdentityCardChecker\Rules\Country;

use Illuminate\Contracts\Validation\Rule;

abstract class Country implements Rule
{
    public function message()
    {
        return __('identity-card-checker::messages.incorrect_id_card');
    }
}
