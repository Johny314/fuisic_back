<?php

use App\Enums\Uri;
use App\Http\Controllers\Auth;
use App\Http\Controllers\CardSet;
use App\Http\Controllers\Card;
use App\Http\Controllers\Section;
use App\Http\Controllers\User;
use App\Http\Controllers\Task;
use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get(Uri::me->value, Auth\Me::class);

    Route::post(Uri::card_set->value, CardSet\Store::class);
    Route::put( Uri::card_set_id->value, CardSet\Update::class);
    Route::delete(Uri::card_set_id->value, CardSet\Destroy::class);

    Route::post(Uri::section->value, Section\Store::class);
    Route::put( Uri::section_id->value, Section\Update::class);
    Route::delete(Uri::section_id->value, Section\Destroy::class);

    Route::post(Uri::user->value, User\Store::class);
    Route::put( Uri::user_id->value, User\Update::class);
    Route::delete(Uri::user_id->value, User\Destroy::class);

    Route::post(Uri::card->value, Card\Store::class);
    Route::put( Uri::card_id->value, Card\Update::class);
    Route::delete(Uri::card_id->value, Card\Destroy::class);

    Route::post(Uri::task->value, Task\Store::class);
    Route::put( Uri::task_id->value, Task\Update::class);
    Route::delete(Uri::task_id->value, Task\Destroy::class);

    Route::post(Uri::test->value, Test\Store::class);
    Route::put( Uri::test_id->value, Test\Update::class);
    Route::delete(Uri::test_id->value, Test\Destroy::class);
    Route::post(Uri::check_answers->value, Test\CheckAnswers::class);
});

Route::post(Uri::register->value, Auth\Register::class);
Route::post(Uri::login->value, Auth\Login::class);

Route::get(Uri::card_set->value, CardSet\Index::class);
Route::get(Uri::card_set_id->value, CardSet\Show::class);

Route::get(Uri::section->value, Section\Index::class);
Route::get(Uri::section_id->value, Section\Show::class);

Route::get(Uri::user->value, User\Index::class);
Route::get(Uri::user_id->value, User\Show::class);

Route::get(Uri::card->value, Card\Index::class);
Route::get(Uri::card_id->value, Card\Show::class);

Route::get(Uri::task->value, Task\Index::class);
Route::get(Uri::task_id->value, Task\Show::class);

Route::get(Uri::test->value, Test\Index::class);
Route::get(Uri::test_id->value, Test\Show::class);
