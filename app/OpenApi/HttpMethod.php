<?php

namespace App\OpenApi;

use App\Enums\Uri;
use Illuminate\Support\Arr;

trait HttpMethod
{
    public function handle(
        string|Uri $path,
        string|array|Tag $tag,
        string $summary,
        bool $secure = true,
        ?string $description = null,
    ) {
        if ($path instanceof Uri) {
            $path = $path->value;
        }
        if ($tag instanceof Tag) {
            $tag = $tag->value;
        }
        if (is_array($tag)) {
            foreach ($tag as &$subtag) {
                if ($subtag instanceof Tag) {
                    $subtag = $subtag->value;
                }
            }
        }

        parent::__construct(
            path: '/'.ltrim($path, '/'),
            description: $description,
            summary: $summary,
            security: $secure ? [['bearer' => []]] : null,
            tags: Arr::wrap($tag),
        );
    }
}
