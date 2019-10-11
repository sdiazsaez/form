<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\MigrationPackage\Migration\Schematics;

class CreateFormsTable extends Migration {

    use Schematics;
    protected $name;
    private   $installableConfig;


    public function __construct() {
        $this->installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $this->installableConfig->getConnection('forms');
        $this->name = $this->installableConfig->getName('forms');
    }

    public function up() {
        $this->create(function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('header_color');
            $table->string('content_color');
            $table->integer('image_id');


            if ($this->installableConfig->getTimestamp('forms')) {
                $table->timestamps();
            }
        });
    }

    public function down() {
        $this->drop();
    }
}

