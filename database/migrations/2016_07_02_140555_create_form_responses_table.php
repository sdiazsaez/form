<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\MigrationPackage\Migration\Schematics;

class CreateFormResponsesTable extends Migration {

    use Schematics;
    protected $name;
    private   $installableConfig;


    public function __construct() {
        $this->installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $this->installableConfig->getConnection('form_responses');
        $this->name = $this->installableConfig->getName('form_responses');
    }

    public function up() {
        $this->create(function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->longText('data');

            if ($this->installableConfig->getTimestamp('form_responses')) {
                $table->timestamps();
            }
        });
    }

    public function down() {
        $this->drop();
    }
}

