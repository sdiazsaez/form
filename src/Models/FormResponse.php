<?php

namespace Larangular\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Larangular\Installable\Facades\InstallableConfig;
use Larangular\RoutingController\Model as RoutingModel;

class FormResponse extends Model {
    use RoutingModel;

    protected $fillable = [
        'form_id',
        'data'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $installableConfig = InstallableConfig::config('Larangular\Form\FormServiceProvider');
        $this->connection = $installableConfig->getConnection('form_responses');
        $this->table = $installableConfig->getName('form_responses');
        $this->timestamps = $installableConfig->getTimestamp('form_responses');
    }

}
