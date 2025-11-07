<?php
namespace App\Http\Services;

use App\Models\User;
use App\Http\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(): User
    {
        return $this->userRepository->findById();
    }

}