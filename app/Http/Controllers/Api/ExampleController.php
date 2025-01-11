<?php

namespace App\Http\Controllers\Api;

use App\Data\Example\Example;
use App\Enums\Uri;
use App\Http\Controllers\Controller;
use App\OpenApi\Get;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;

class ExampleController extends Controller
{
    #[Get(
        path: Uri::example,
        tag: Tag::example,
        summary: 'Тестовый вывод'
    )]
    #[Response(200, Example::class)]
    public function __invoke()
    {
        return response()->json(['message' => 'Hello, world!']);
    }
}
