<?php

Route::group([
    'prefix' => config('form.route_prefix', 'api/forms/'),
    'middleware' => 'api',
    'namespace' => 'Larangular\Form\Http\Controllers',
    'as' => 'larangular.api.form.'
], static function () {
    Route::resource('form', 'Forms\Gateway');
    Route::resource('field', 'Fields\Gateway');
    Route::resource('response', 'Responses\Gateway');
});
