<?php

use Illuminate\Contracts\Auth\Guard;

if (!function_exists('CustomerAuth')) {

    function CustomerAuth(): Guard|\Illuminate\Foundation\Application|\Illuminate\Auth\SessionGuard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
    {
        return auth('customers');
    }
}
