<?php

namespace App\Http\Controllers\User;

use App\Enums\Uri;
use App\Models\Card\CardSet;
use App\OpenApi\Delete;
use App\OpenApi\Parameter\ModelId;
use App\OpenApi\Response\NotFound;
use App\OpenApi\Response\Ok;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    #[Delete(
        path: Uri::user_id,
        tag: Tag::user,
        summary: 'Удалить пользователя',
    )]
    #[ModelId('user', 'id пользователя')]

    #[Response(404, NotFound::class)]
    #[Response(200, Ok::class)]
    public function __invoke(CardSet $user): JsonResponse
    {
        $user->delete();

        return new JsonResponse;
    }
}
