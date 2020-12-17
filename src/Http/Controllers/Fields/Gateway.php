<?php

namespace Larangular\Form\Http\Controllers\Fields;

use Larangular\Form\Models\FormField;
use Larangular\RoutingController\{Contracts\IGatewayModel, Controller};


class Gateway extends Controller implements IGatewayModel {

    public function model() {
        return FormField::class;
    }

}
