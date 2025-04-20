<?php

namespace App\Http\Controllers\Card;

use App\Data\Card\Card as Data;
use App\Enums\Uri;
use App\Models\Card\Card;
use App\OpenApi\Post;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    #[Post(
        path: Uri::card,
        tag: Tag::card,
        summary: 'Новая карточка',
    )]
    #[RequestBody(Data::class)]

    #[Response(201, Data::class)]
    public function __invoke(Data $data): Data
    {
        $card = Card::query()->create($data->toArray());

        return Data::from($card);
    }
}
