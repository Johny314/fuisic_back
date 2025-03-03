<?php

use App\Enums\Uri;
use App\Http\Controllers\CardSet;
use App\Http\Controllers\Section;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;


Route::delete(Uri::card_set_id->value, CardSet\Destroy::class);
Route::get(Uri::card_set->value, CardSet\Index::class);
Route::get(Uri::card_set_id->value, CardSet\Show::class);
Route::post(Uri::card_set->value, CardSet\Store::class);
Route::put( Uri::card_set_id->value, CardSet\Update::class);

Route::delete(Uri::section_id->value, Section\Destroy::class);
Route::get(Uri::section->value, Section\Index::class);
Route::get(Uri::section_id->value, Section\Show::class);
Route::post(Uri::section->value, Section\Store::class);
Route::put( Uri::section_id->value, Section\Update::class);

Route::delete(Uri::user_id->value, User\Destroy::class);
Route::get(Uri::user->value, User\Index::class);
Route::get(Uri::user_id->value, User\Show::class);
Route::post(Uri::user->value, User\Store::class);
Route::put( Uri::user_id->value, User\Update::class);

