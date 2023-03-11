<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->authService->LoginUser($request->only('email', 'password'));
        if($user=="not valid"){
            return response()->json([
                "user" => "not valid auth"
            ],401);
        }
        return response()->json([
            "user" => new UserResource($user),
            "token" => $user->createToken('task')->plainTextToken
        ],200);

    }
    public function register(RegisterRequest $request)
    {
        $user = $this->authService->registerUser($request->validated());
        return response()->json([
            "user" => new UserResource($user),
            "token" => $user->createToken('task')->plainTextToken
        ],200);
    }
}
