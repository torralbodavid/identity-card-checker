<?php

namespace Torralbodavid\IdentityCardChecker\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Torralbodavid\IdentityCardChecker\Rules\Country\Country;
use Torralbodavid\IdentityCardChecker\Rules\Country\Spain;

class IdCard implements Rule
{
    protected Country $country;

    /**
     * @throws Exception
     */
    public function __construct(protected ?string $language = null) {
        $this->country = match ($this->language) {
          'es' => new Spain(),
            default => throw new Exception(trans('identity-card-checker::messages.country_not_supported'))
        };
    }

    public function passes($attribute, $value)
    {
        return (new Spain())->passes($attribute, $value);
    }

    public function message()
    {
        return (new Spain())->message();
    }
}
