<?php

namespace App\Services;

use App\User;

class UserService
{
    public function profile($user_id) {
        $user = User::findorFail($user_id);

        return view('users.profile', [
            'user' => $user -> first(),
            'articles' => $user -> articles() -> latest() -> get()
        ]);
    }



}
