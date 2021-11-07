<?php

namespace Torralbodavid\IdentityCardChecker;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Torralbodavid\IdentityCardChecker\IdentityCardChecker
 */
class IdentityCardCheckerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'identity-card-checker';
    }
}
