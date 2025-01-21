<?php

namespace Larangular\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Jedrzej\Searchable\SearchableTrait;
use Larangular\Form\Traits\HasPickerListValues;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\Metadata\Traits\Metable;
use Larangular\RoutingController\Model as RoutingModel;

class FormField extends Model {
    use RoutingModel, Metable, HasPickerListValues, SearchableTrait;

    protected $fillable = [
        'form_id',
        'key',
        'label',
        'type',
    ];
    protected $searchable = ['*'];

    protected $with = [
        'pickerListValues'
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
        if (is_null($this->attributes['key'])) {
            $this->attributes['key'] = $value;
        }
    }

    public function setKeyAttribute($value) {
        $this->attributes['key'] = Str::slug($value);
    }

}
