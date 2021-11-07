<?php

namespace Torralbodavid\IdentityCardChecker\Commands;

use Illuminate\Console\Command;

class IdentityCardCheckerCommand extends Command
{
    public $signature = 'identity-card-checker';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
