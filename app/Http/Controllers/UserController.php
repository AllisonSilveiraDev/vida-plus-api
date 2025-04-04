<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller

{
    public function __construct(protected UserService $userService){}

    public function login(Request $request): JsonResponse
    {
        $data = $this->userService->login();
        return response()->json($data);
    }
}