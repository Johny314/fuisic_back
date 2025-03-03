<?php

namespace App\Enums;

enum Uri: string
{
    case card_set = 'card_set';
    case card_set_id = 'card_set/{card_set}';

    case card = 'card';
    case card_id = 'card/{card}';

    case test = 'test';
    case test_id = 'test/{test}';

    case task = 'task';
    case task_id = 'task/{task}';

    case section = 'section';
    case section_id = 'section/{section}';

    case user = 'user';
    case user_id = 'user/{user}';
}
