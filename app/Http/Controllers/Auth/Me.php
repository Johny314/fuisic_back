<?php

namespace App\Http\Controllers\Auth;

use App\Data\User\User as UserData;
use App\Enums\Uri;
use App\OpenApi\Get;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;

class Me extends Controller
{
    #[Get(
        path: Uri::me,
        tag: Tag::auth,
        summary: 'Текущий пользователь',
    )]
    #[Response(200, UserData::class)]
    public function __invoke(): UserData
    {
        return UserData::from(auth()->user()->toArray());
    }
}
