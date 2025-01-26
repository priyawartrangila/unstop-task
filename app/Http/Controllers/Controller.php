<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as APIController;

class Controller extends APIController
{
    use AuthorizesRequests, ValidatesRequests;
}