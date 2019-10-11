<?php

namespace Larangular\Form;

use Larangular\Installable\{Contracts\HasInstallable, Contracts\Installable, Installer\Installer};
use Larangular\Installable\Support\{InstallableServiceProvider as ServiceProvider, PublisableGroups, PublishableGroups};

class FormServiceProvider extends ServiceProvider implements HasInstallable {

    protected $defer = false;

    public function boot() {

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->publishesType([
            __DIR__ . '/../config/form.php' => config_path('form.php'),
        ], PublishableGroups::Config);

        $this->loadMigrationsFrom([
            __DIR__ . '/database/migrations',
            database_path('migrations/form'),
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/../config/form.php', 'form');
        $this->declareMigrationGlobal();
        $this->declareMigrationForm();

    }

    private function declareMigrationGlobal(): void {
        $this->declareMigration([
            'connection' => 'mysql',
            'migrations' => [
                'local_path' => base_path() . '/vendor/larangular/form/database/migrations',
            ],
            'seeds'        => [
                'local_path' => __DIR__ . '/../database/seeds',
            ],
            'seed_classes' => [
            ],
        ]);
    }

    public function installer(): Installable {
        return new Installer(__CLASS__);
    }

    private function declareMigrationForm(): void {
        $this->declareMigration([
            'name'      => 'form_fields',
            'timestamp' => true,
        ]);

        $this->declareMigration([
            'name'      => 'form_responses',
            'timestamp' => true,
        ]);

        $this->declareMigration([
            'name'      => 'form',
            'tiemstamp' => true,
        ]);
    }
}
