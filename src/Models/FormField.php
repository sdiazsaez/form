<?php

namespace Larangular\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\RoutingController\Model as RoutingModel;

class FormField extends Model {
    use RoutingModel;

    protected $fillable = [
        'form_id',
        'key',
        'label',
        'type',
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $installableConfig->getConnection('form_fields');
        $this->table = $installableConfig->getName('form_fields');
        $this->timestamps = $installableConfig->getTimestamp('form_fields');
    }

    public function setLabelAttribute($value) {
        $this->attributes['label'] = $value;
        $this->attributes['key'] = Str::slug($value);
    }

}
