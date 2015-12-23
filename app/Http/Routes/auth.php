<?php

// USER AUTHENTICATION

Route::post('auth/login', [
    'as'    => 'auth.login', 
    'uses'  => 'Auth\AuthController@login'
]);

Route::post('auth/register', [
    'as'    => 'auth.register', 
    'uses'  => 'Auth\AuthController@register'
]);
