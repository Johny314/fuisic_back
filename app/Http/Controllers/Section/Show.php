<?php

namespace App\Http\Controllers\Section;

use App\Data\Section as Data;
use App\Enums\Uri;
use App\Models\Section;
use App\OpenApi\Get;
use App\OpenApi\Parameter\ModelId;
use App\OpenApi\Response\NotFound;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    #[Get(
        path: Uri::section_id,
        tag: Tag::section,
        summary: 'Вывести раздел по его id',
    )]
    #[ModelId('section', 'id раздела')]

    #[Response(200, Data::class)]
    #[Response(404, NotFound::class)]
    public function __invoke(Section $section): Data
    {
        return Data::from($section);
    }
}
