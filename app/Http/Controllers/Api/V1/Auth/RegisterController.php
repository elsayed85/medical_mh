<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(collect($request->all())->put('password', Hash::make($request->password))->except('avatar')->toArray());
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $user->addMedia($avatar)->usingFileName($avatar->getClientOriginalName())->usingName($avatar->getClientOriginalName())->toMediaCollection('avatar');
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('mobile')->plainTextToken,
            'token_type' => "Bearer"
        ]);
    }
}
