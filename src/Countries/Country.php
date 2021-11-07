<?php

namespace Torralbodavid\IdentityCardChecker\Countries;

use Illuminate\Contracts\Validation\Rule;

abstract class Country implements Rule
{
    protected string $idCard;

    public function message()
    {
        return __('identity-card-checker::messages.incorrect_id_card');
    }
}
