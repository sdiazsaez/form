<?php

namespace Larangular\Form\Http\Controllers\Responses;

use Larangular\Form\Models\FormResponse;
use Larangular\RoutingController\{Contracts\IGatewayModel, Controller};


class Gateway extends Controller implements IGatewayModel {

    public function model() {
        return FormResponse::class;
    }

}
