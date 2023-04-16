<?php
namespace LsModel\Service\Authentication;

use LsModel\Service\ServiceActionResult;
use LsModel\Repository\RepoUser;

class ServiceAuthByPassword
{
    public function authenticate(
        $username,
        $password,
        RepoUser $userRepo
    ): ServiceActionResult
    {
        $user = $userRepo->find([
            'username' => $username
        ]);

        if (!$user) {
            return new ServiceActionResult(['User not found']);
        }

        if (empty($user->password)) {
            return new ServiceActionResult(['User password not set']);
        }

        if (password_verify($password, $user->password)) {
            return new ServiceActionResult();
        }

        return ServiceActionResult::factoryUnknownError();
    }
}