<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\MigrationPackage\Migration\Schematics;

class CreateFormFieldsTable extends Migration {

    use Schematics;
    protected $name;
    private   $installableConfig;


    public function __construct() {
        $this->installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $this->installableConfig->getConnection('form_fields');
        $this->name = $this->installableConfig->getName('form_fields');
    }

    public function up() {
        $this->create(function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id')
                  ->unsigned();
            $table->string('key');
            $table->string('label');
            $table->integer('type');

            if ($this->installableConfig->getTimestamp('form_fields')) {
                $table->timestamps();
            }
        });
    }

    public function down() {
        $this->drop();
    }
}

