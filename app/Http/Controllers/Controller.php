<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @method void middleware(array|string $middleware, array $options = [])
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
