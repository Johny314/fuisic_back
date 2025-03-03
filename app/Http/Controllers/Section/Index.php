<?php

namespace App\Http\Controllers\Section;

use App\Data\Section as Data;
use App\Enums\Uri;
use App\Models\Section;
use App\OpenApi\Get;
use App\OpenApi\Response\IndexResponse;
use App\OpenApi\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

class Index extends Controller
{
    #[Get(
        path: Uri::section,
        tag: Tag::section,
        summary: 'Список разделов',
    )]

    #[IndexResponse(Data::class, description: 'Список разделов')]
    public function __invoke(Request $request): Collection
    {
        return Data::collect(Section::query()->get());
    }
}
