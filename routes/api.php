<?php

use App\Enums\Uri;
use App\Http\Controllers\Api\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get(Uri::example->value, ExampleController::class);
