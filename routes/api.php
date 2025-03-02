<?php

use App\Enums\Uri;
use App\Http\Controllers\CardSet;
use Illuminate\Support\Facades\Route;

Route::get(Uri::card_set_id->value, CardSet\Destroy::class);
Route::get(Uri::card_set->value, CardSet\Index::class);
Route::get(Uri::card_set_id->value, CardSet\Show::class);
Route::get(Uri::card_set->value, CardSet\Store::class);
Route::get(Uri::card_set_id->value, CardSet\Update::class);
