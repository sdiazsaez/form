<?php

namespace Larangular\Form\Http\Controllers\Forms;

use Larangular\Form\Models\Form;
use Larangular\RoutingController\{Contracts\IGatewayModel, Controller};


class Gateway extends Controller implements IGatewayModel {

    public function model() {
        return Form::class;
    }

}
