<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        return $user;
    }

    public function getMyProfile()
    {
        return auth()->user();
    }

    public function getUserProfile($id)
    {
        return User::find($id);
    }
}
