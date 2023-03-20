<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\MigrationPackage\Migration\Schematics;

class NullableFormId extends Migration {

    use Schematics;

    protected $name;
    private   $installableConfig;


    public function __construct() {
        $this->installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $this->installableConfig->getConnection('form_fields');
        $this->name = $this->installableConfig->getName('form_fields');
    }

    public function up() {
        $this->alter(function (Blueprint $table) {
            $table->integer('form_id')
                  ->nullable()
                  ->change();
            $table->unique([
                'key',
                'type',
            ]);
        });
    }

    public function down() {
        $this->alter(function (Blueprint $table) {
            $this->dropUnique([
                'key',
                'type',
            ]);
            $table->integer('form_id')
                  ->nullable(false)
                  ->change();
        });
    }
}

