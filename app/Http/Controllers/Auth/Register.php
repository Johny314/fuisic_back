<?php

namespace App\Http\Controllers\Auth;

use App\Data\Auth\Token;
use App\Data\User\User as UserData;
use App\Enums\Uri;
use App\Enums\UserType;
use App\Models\User;
use App\OpenApi\Post;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    #[Post(
        path: Uri::register,
        tag: Tag::auth,
        summary: 'Регистрация пользователя',
    )]
    #[RequestBody(UserData::class)]
    #[Response(201, Token::class)]
    public function __invoke(UserData $data): Token
    {
        $user = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'user_type' => $data->user_type?->value ?? UserType::student->value,
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return Token::from(['token' => $token]);
    }
}
