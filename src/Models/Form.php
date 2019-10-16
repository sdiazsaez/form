<?php

namespace Larangular\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\RoutingController\Model as RoutingModel;

class Form extends Model {
    use RoutingModel;

    protected $fillable = [
        'name',
        'header_color',
        'content_color',
        'image_id',
    ];

    protected $with = [
        'fields',
        'image',
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $installableConfig->getConnection('forms');
        $this->table = $installableConfig->getName('forms');
        $this->timestamps = $installableConfig->getTimestamp('forms');
    }

    public function fields() {
        return $this->hasMany(FormField::class, 'form_id', 'id');
    }

    public function responses() {
        return $this->hasMany(FormResponse::class, 'form_id', 'id');
    }

    public function image() {
        return $this->hasOne('Larangular\FileManager\Models\FileManager', 'id', 'image_id');
    }

}
