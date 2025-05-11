<?php

namespace App\Http\Controllers\Auth;

use App\Data\Auth\Login as Data;
use App\Data\Auth\Token;
use App\Enums\Uri;
use App\Models\User;
use App\OpenApi\Post;
use App\OpenApi\Request\RequestBody;
use App\OpenApi\Response\Response;
use App\OpenApi\Tag;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    #[Post(
        path: Uri::login,
        tag: Tag::auth,
        summary: 'Аутентификация пользователя',
    )]
    #[RequestBody(Data::class)]
    #[Response(200, Token::class)]
    public function __invoke(Data $data): Token
    {
        $userP = User::query()->where('email', $data->email)->first()->password;
        $dataP = Hash::make($data->password);
        logger('БД');
        logger($userP);
        logger('ЗАПРОС');
        logger($dataP);

        if (!Auth::attempt([
            'email' => $data->email,
            'password' => $data->password,
        ])) {
            throw ValidationException::withMessages([
                'email' => ['Неверный email или пароль.'],
            ]);
        }



        $user = Auth::user();


        $token = $user->createToken('api-token')->plainTextToken;

        return Token::from(['token' => $token]);
    }
}
