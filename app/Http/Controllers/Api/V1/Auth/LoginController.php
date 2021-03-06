<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\Api\V1\Patient\LoginResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($this->credentials())) {
            return (new LoginResource(["token" => auth()->user()->createToken('mobile')->plainTextToken , 'type' => "Bearer"]));
        }

        throw ValidationException::withMessages(['email' => "email or password is wrong"]);
    }


    protected function credentials()
    {
        if (is_numeric(request('email'))) {
            return ['phone' => request('email'), 'password' => request('password')];
        } elseif (filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => request('email'), 'password' => request('password')];
        }
    }
}
