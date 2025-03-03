<?php

namespace App\Http\Controllers\User;

use App\Data\User as Data;
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
        path: Uri::user,
        tag: Tag::user,
        summary: 'Новый пользователь',
    )]
    #[RequestBody(Data::class)]

    #[Response(201, Data::class)]
    public function __invoke(Data $data): Data
    {
        $user = Section::query()->create($data->toArray());

        return Data::from($user);
    }
}
