<?php

use Illuminate\Support\Facades\Route;
route::get('/{any}', function () {    return view('app');  // The Blade view that serves your React app
})->where('any', '.*');
