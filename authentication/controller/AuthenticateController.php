<?php

use LsModel\Service\ServiceAuthentication;
use LsModel\Repository\RepoUser;

class AuthenticationController
{
    public function loginAction(
        $request,
        $config,
        ServiceAuthentication $serviceAuthentication,
        RepoUser $userRepo
    )
    {
        $serviceActionResult = $serviceAuthentication->authenticate(
            [
                'defaultAuth' => $config->getConfig('default_displayed_auth_method')
            ],
            $request->getPost('username'),
            $request->getPost('password')
            $userRepo
        );

        $this->redirect(
            $serviceActionResult->isSuccess() ? '/' : '/error'
        );
    }

    public function redirect($url)
    {
        // Example
    }
}