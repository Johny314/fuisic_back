<?php

namespace App\OpenApi;

use App\Enums\Arrayable;

enum Tag: string
{
    use Arrayable;

    case card = 'card';
    case test = 'test';
    case card_set = 'card_set';
    case task = 'task';
    case section = 'section';
    case user = 'user';

    public function label(): string
    {
        return match ($this) {
            self::card => 'Карточки',
            self::test => 'Тесты',
            self::card_set => 'Наборы карточек',
            self::task => 'Задачи',
            self::section => 'Разделы',
            self::user => 'Пользователи',
        };
    }
}
