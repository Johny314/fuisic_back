<?php

namespace App\OpenApi;

use App\Enums\Uri;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Post extends \OpenApi\Attributes\Post
{
    use HttpMethod;

    public function __construct(
        string|Uri $path,
        string|array|Tag $tag,
        string $summary,
        bool $secure = true,
        ?string $description = null,
    ) {
        $this->handle($path, $tag, $summary, $secure, $description);
    }
}
