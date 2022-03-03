<?php

namespace LSNepomuceno\LaravelPackageMaker\Commands\Routing;

use Illuminate\Routing\Console\MiddlewareMakeCommand as MakeMiddleware;
use LSNepomuceno\LaravelPackageMaker\Traits\CreatesPackageStubs;
use LSNepomuceno\LaravelPackageMaker\Traits\HasNameInput;

class MiddlewareMakeCommand extends MakeMiddleware
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:middleware';

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
