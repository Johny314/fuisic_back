<?php

namespace App\OpenApi;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class TagAttr extends \OpenApi\Attributes\Tag
{
    public function __construct(Tag $tn)
    {
        parent::__construct($tn->value, $tn->label());
    }
}
