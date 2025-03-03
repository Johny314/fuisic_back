<?php

namespace App\Http\Controllers\Section;

use App\Data\Section as Data;
use App\Enums\Uri;
use App\Models\Section;
use App\OpenApi\Post;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    #[Post(
        path: Uri::section,
        tag: Tag::section,
        summary: 'Новый раздел',
    )]
    #[RequestBody(Data::class)]

    #[Response(201, Data::class)]
    public function __invoke(Data $data): Data
    {
        $section = Section::query()->create($data->toArray());

        return Data::from($section);
    }
}
