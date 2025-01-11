<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;
#[OA\Info(
    version: '0.1',
    description: 'Данный проект находится в разработке',
    title: 'FUISIC Backend API'
)]
#[OA\SecurityScheme(
    securityScheme: 'bearer',
    type: 'http',
    description: 'access_token',
    name: 'Authorization',
    in: 'header',
    scheme: 'bearer',
)]
abstract class Controller
{
    //
}
