<?php

namespace LSNepomuceno\LaravelPackageMaker\Commands\Database;

use Illuminate\Database\Console\Factories\FactoryMakeCommand as MakeFactory;
use LSNepomuceno\LaravelPackageMaker\Traits\CreatesPackageStubs;
use LSNepomuceno\LaravelPackageMaker\Traits\HasNameInput;

class FactoryMakeCommand extends MakeFactory
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:factory';

    /**
     * Get the destination class path.
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'/database/factories/';
    }
}
