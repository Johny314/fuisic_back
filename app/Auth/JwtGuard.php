<?php

namespace App\Auth;

use App\Models\User;
use Exception;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;

class JwtGuard implements Guard
{
    use GuardHelpers;

    public function user()
    {
        if ($this->user) {
            return $this->user;
        }

        $jwt = request()->bearerToken();
        if (! $jwt) {
            throw new Exception('No bearer token in Authorize header');
        }

        $parser = new Parser(new JoseEncoder);
        $token = $parser->parse($jwt);

        $id = $token->claims()->get('sub');

        $user = User::query()->find($id);

        return $this->user = $user;
    }

    public function validate(array $credentials = [])
    {
        throw new Exception('There is no validation in app');
    }
}
