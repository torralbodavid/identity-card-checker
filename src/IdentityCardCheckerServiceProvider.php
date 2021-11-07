<?php

namespace Torralbodavid\IdentityCardChecker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Torralbodavid\IdentityCardChecker\Commands\IdentityCardCheckerCommand;

class IdentityCardCheckerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('identity-card-checker')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_identity-card-checker_table')
            ->hasCommand(IdentityCardCheckerCommand::class);
    }
}
