<?php
namespace LsModel\Service;

use LsModel\Service\Authentication\ServiceAuthByPassword;
use LsModel\Repository\RepoUser;

class ServiceAuthentication
{
    public function authenticate(
        $config,
        $requestData,
        ServiceAuthByPassword $serviceAuthByPassword,
        RepoUser $repoUser
    ): ServiceActionResult
    {
        $serviceActionResult = null;
        if (isset($config['defaultAuth']) && $config['defaultAuth'] == 'password') {
            $serviceActionResult = $serviceAuthByPassword->authenticate(
                $requestData['username'],
                $requestData['password'],
                $repoUser
            );
        }
        return $serviceActionResult ?: ServiceActionResult::factoryUnknownError();
    }
}