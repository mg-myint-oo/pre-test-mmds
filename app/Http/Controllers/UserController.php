<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this -> userService = $userService;
    }

    public function profile() {
        return $this -> userService -> profile(auth() -> id());
    }

}
