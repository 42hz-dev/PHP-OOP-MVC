<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\UserService;

class UserController
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): User
    {
        $data = $this->userService->getUser();
        return new User($data->getId(), $data->getName(), $data->getAge());
    }
}