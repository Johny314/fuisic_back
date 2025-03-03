<?php

namespace App\Http\Controllers\User;

use App\Data\User as Data;
use App\Enums\Uri;
use App\Models\Section;
use App\OpenApi\Parameter\ModelId;
use App\OpenApi\Put;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    #[Put(
        path: Uri::user_id,
        tag: Tag::user,
        summary: 'Обновить данные раздела',
    )]
    #[ModelId('user', 'id раздела')]
    #[RequestBody(Data::class)]

    #[Response(200, Data::class)]
    public function __invoke(Section $user, Data $data): Data
    {
        $user->update($data->toArray());

        return Data::from($user);
    }
}
