<?php

namespace IbrahimBougaoua\LaravelVfdplus\Commands;

use Illuminate\Console\Command;

class LaravelVfdplusCommand extends Command
{
    public $signature = 'laravel-vfdplus';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
