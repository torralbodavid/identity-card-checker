<?php

namespace Torralbodavid\IdentityCardChecker\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Torralbodavid\IdentityCardChecker\Countries\Country;
use Torralbodavid\IdentityCardChecker\Countries\Spain;

class IdCard implements Rule
{
    protected Country $country;

    /**
     * @throws Exception
     */
    public function __construct(protected ?string $language = null)
    {
        $this->country = match ($this->language) {
            'es' => new Spain(),
            default => throw new Exception(trans('identity-card-checker::messages.country_not_supported'))
        };
    }

    public function passes($attribute, $value)
    {
        return $this->country->passes($attribute, $value);
    }

    public function message()
    {
        return $this->country->message();
    }
}
