<?php

namespace Controller;

use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;
use model\UserManager;

class AuthController extends AbstractController
{
    public function login(Request $request): Response
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";

        $userManager = new UserManager;
        if ($request->request->has('username') && $request->request->has('password')) {
            $userId = $userManager->GetUserIdFromUserAndPassword($request->request->get('username'), $request->request->get('password'));
            if ($userId > 0) {
                $request->getSession()->set('userId', $userId);
                $this->redirectToRoute("display");
                $data = ["items" => $items];
                return $this->render('DisplayBuild.php', $data);
            } else {
                $data = ["errorMsg" => "Wrong login and/or password.", "items" => $items];
                return $this->render('DisplayBuild.php', $data);
            }
        } else {
            $data = ["items" => $items];
            return $this->render('DisplayBuild.php', $data);
        }
    }

    public function logout(Request $request): Response
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";

        if ($request->getSession()->has('userId')) {
            $request->getSession()->remove('userId');
        };
        $this->redirectToRoute("display");
        $data = ["items" => $items];
        return $this->render('DisplayBuild.php', $data);
    }

    public function register(Request $request): Response
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";

        $userManager = new UserManager;
        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $errorMsg = NULL;
            if ($userManager->IsNicknameFree($request->request->get('username'))) {
                $data = ["errorMsg" => "Nickname already used."];
                return $this->render('RegisterForm.php', $data);
            } else if ($request->request->get('password') != $request->request->get('passwordRetype')) {
                $data = ["errorMsg" => "Passwords are not the same."];
                return $this->render('RegisterForm.php', $data);
            } else if (strlen(trim($request->request->get('password'))) < 8) {
                $data = ["errorMsg" => "Your password should have at least 8 characters."];
                return $this->render('RegisterForm.php', $data);
            } else if (strlen(trim($request->request->get('username'))) < 4) {
                $data = ["errorMsg" => "Your nickame should have at least 4 characters."];
                return $this->render('RegisterForm.php', $data);
            }
            if ($errorMsg) {
                return $this->render('RegisterForm.php');
            } else {
                $userId = $userManager->CreateNewUser($request->request->get('username'), $request->request->get('password'));
                $request->getSession()->set('userId', $userId);
                $this->redirectToRoute("display");
                $data = ["items" => $items];
                return $this->render('DisplayBuild.php', $data);
            }
        } else {
            return $this->render('RegisterForm.php');
        }
    }
}
