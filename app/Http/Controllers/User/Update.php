<?php

namespace App\Http\Controllers\User;

use App\Data\User\UserUpdate as Data;
use App\Data\User\User as UserData;
use App\Enums\Uri;
use App\Models\User;
use App\OpenApi\Parameter\ModelId;
use App\OpenApi\Put;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class Update extends Controller
{
    #[Put(
        path: Uri::user_id,
        tag: Tag::user,
        summary: 'Обновить данные пользователя',
    )]
    #[ModelId('user', 'id пользователя')]
    #[RequestBody(Data::class)]

    #[Response(200, Data::class)]
    public function __invoke(User $user, Data $data): UserData
    {
        if ($data->password) {
            $data->password = Hash::make($data->password);
        }

        $user->update($data->toArray());

        return UserData::from($user);
    }
}
