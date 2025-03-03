<?php

namespace App\Enums;

enum Uri: string
{
    case card_set = 'card_set';
    case card_set_id = 'card_set_id';

    case card = 'card';
    case card_id = 'card_id';

    case test = 'test';
    case test_id = 'test_id';

    case task = 'task';
    case task_id = 'task_id';

    case section = 'section';
    case section_id = 'section_id';

    case user = 'user';
    case user_id = 'user_id';
}
