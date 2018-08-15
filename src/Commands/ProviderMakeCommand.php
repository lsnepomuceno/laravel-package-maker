<?php

namespace Naoray\LaravelPackageMaker\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as MakeProvider;
use Naoray\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Naoray\LaravelPackageMaker\Traits\HasNameAttribute;

class ProviderMakeCommand extends MakeProvider
{
    use CreatesPackageStubs, HasNameAttribute;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:package:provider';

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'/src';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
}
