<?php

namespace LSNepomuceno\LaravelPackageMaker;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\ServiceProvider;
use LSNepomuceno\LaravelPackageMaker\Commands\AddPackage;
use LSNepomuceno\LaravelPackageMaker\Commands\ClonePackage;
use LSNepomuceno\LaravelPackageMaker\Commands\Database\FactoryMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Database\MigrationMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Database\SeederMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\DeletePackageCredentials;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ChannelMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ConsoleMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\EventMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ExceptionMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\JobMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ListenerMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\MailMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ModelMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\NotificationMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ObserverMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\PolicyMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ProviderMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\RequestMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\ResourceMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\RuleMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Foundation\TestMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\NovaMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\BaseTestMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\CodecovMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\ComposerMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\ContributionMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\GitignoreMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\LicenseMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\PhpunitMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\ReadmeMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\StyleciMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Package\TravisMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\PackageMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Replace;
use LSNepomuceno\LaravelPackageMaker\Commands\Routing\ControllerMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Routing\MiddlewareMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\SavePackageCredentials;
use LSNepomuceno\LaravelPackageMaker\Commands\Standard\AnyMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Standard\ContractMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Standard\InterfaceMakeCommand;
use LSNepomuceno\LaravelPackageMaker\Commands\Standard\TraitMakeCommand;

class LaravelPackageMakerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(MigrationCreator::class)
            ->needs('$customStubPath')
            ->give(function ($app) {
                return $app->basePath('stubs');
            });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands(
            array_merge(
                $this->routingCommands(),
                $this->packageCommands(),
                $this->databaseCommands(),
                $this->standardCommands(),
                $this->foundationCommands(),
                $this->packageInternalCommands()
            )
        );
    }

    /**
     * Get package database related commands.
     *
     * @return array
     */
    protected function databaseCommands()
    {
        return [
            SeederMakeCommand::class,
            FactoryMakeCommand::class,
            MigrationMakeCommand::class,
        ];
    }

    /**
     * Get package foundation related commands.
     *
     * @return array
     */
    protected function foundationCommands()
    {
        return [
            JobMakeCommand::class,
            MailMakeCommand::class,
            TestMakeCommand::class,
            RuleMakeCommand::class,
            EventMakeCommand::class,
            ModelMakeCommand::class,
            PolicyMakeCommand::class,
            ConsoleMakeCommand::class,
            RequestMakeCommand::class,
            ChannelMakeCommand::class,
            ProviderMakeCommand::class,
            ListenerMakeCommand::class,
            ObserverMakeCommand::class,
            ResourceMakeCommand::class,
            ExceptionMakeCommand::class,
            NotificationMakeCommand::class,
        ];
    }

    /**
     * Get package related commands.
     *
     * @return array
     */
    protected function packageCommands()
    {
        return [
            NovaMakeCommand::class,
            ReadmeMakeCommand::class,
            TravisMakeCommand::class,
            LicenseMakeCommand::class,
            PhpunitMakeCommand::class,
            StyleciMakeCommand::class,
            CodecovMakeCommand::class,
            ComposerMakeCommand::class,
            BaseTestMakeCommand::class,
            GitignoreMakeCommand::class,
            ContributionMakeCommand::class,
        ];
    }

    /**
     * Get package internal related commands.
     *
     * @return array
     */
    protected function packageInternalCommands()
    {
        return [
            Replace::class,
            AddPackage::class,
            ClonePackage::class,
            PackageMakeCommand::class,
            SavePackageCredentials::class,
            DeletePackageCredentials::class,
        ];
    }

    /**
     * Get package routing related commands.
     *
     * @return array
     */
    protected function routingCommands()
    {
        return [
            ControllerMakeCommand::class,
            MiddlewareMakeCommand::class,
        ];
    }

    /**
     * Get standard related commands.
     *
     * @return array
     */
    protected function standardCommands()
    {
        return [
            AnyMakeCommand::class,
            TraitMakeCommand::class,
            ContractMakeCommand::class,
            InterfaceMakeCommand::class,
        ];
    }
}
