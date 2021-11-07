<?php

namespace Torralbodavid\IdentityCardChecker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IdentityCardCheckerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('identity-card-checker')
            ->hasConfigFile()
            ->hasViews();
    }
}
