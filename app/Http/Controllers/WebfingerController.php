<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class WebfingerController
{
    public function __invoke()
    {
        return new JsonResponse();
    }
}
