<?php

namespace LSNepomuceno\LaravelPackageMaker\Commands;

use Illuminate\Console\GeneratorCommand as Generator;
use LSNepomuceno\LaravelPackageMaker\Traits\CreatesPackageStubs;

abstract class GeneratorCommand extends Generator
{
    use CreatesPackageStubs;

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}
