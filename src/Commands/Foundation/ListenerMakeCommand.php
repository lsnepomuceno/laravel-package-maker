<?php

namespace LSNepomuceno\LaravelPackageMaker\Commands\Foundation;

use Illuminate\Foundation\Console\ListenerMakeCommand as MakeListener;
use LSNepomuceno\LaravelPackageMaker\Traits\CreatesPackageStubs;
use LSNepomuceno\LaravelPackageMaker\Traits\HasNameInput;

class ListenerMakeCommand extends MakeListener
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:listener';

    /**
     * Get the destination class path.
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'src';
    }
}
