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
                // $_SESSION['userId'] = $userId;
                $request->getSession()->set('userId', $userId);
                $this->redirectToRoute("display");
                $data = ["items" => $items];
                return $this->render('DisplayBuild.php', $data);
            } else {

                $data = ["errorMsg" => "Wrong login and/or password.", "items" => $items];
                return $this->render('DisplayBuild.php', $data);
                // $errorMsg = "Wrong login and/or password.";
                // include "../src/view/DisplayBuild.php";
            }
        } else {
            $data = ["items" => $items];
            return $this->render('DisplayBuild.php', $data);
            // include "../src/view/DisplayBuild.php";
        }
    }

    public function logout(Request $request): Response
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        // if (isset($_SESSION['userId'])) {
        //     unset($_SESSION['userId']);
        // }
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
                // $errorMsg = "Nickname already used.";
                $data = ["errorMsg" => "Nickname already used."];
                return $this->render('RegisterForm.php', $data);
            } else if ($request->request->get('password') != $request->request->get('passwordRetype')) {
                $data = ["errorMsg" => "Passwords are not the same."];
                return $this->render('RegisterForm.php', $data);
            } else if (strlen(trim($request->request->get('password'))) < 8) {
                // $errorMsg = "Your password should have at least 8 characters.";
                $data = ["errorMsg" => "Your password should have at least 8 characters."];
                return $this->render('RegisterForm.php', $data);
            } else if (strlen(trim($request->request->get('username'))) < 4) {
                // $errorMsg = "Your nickame should have at least 4 characters.";
                $data = ["errorMsg" => "Your nickame should have at least 4 characters."];
                return $this->render('RegisterForm.php', $data);
            }
            if ($errorMsg) {
                // include "../src/view/RegisterForm.php";
                return $this->render('RegisterForm.php');
            } else {
                $userId = $userManager->CreateNewUser($request->request->get('username'), $request->request->get('password'));
                $request->getSession()->set('userId', $userId);
                // $_SESSION['userId'] = $userId;
                $this->redirectToRoute("display");
                $data = ["items" => $items];
                return $this->render('DisplayBuild.php', $data);
            }
        } else {
            // include "../src/view/RegisterForm.php";
            return $this->render('RegisterForm.php');
        }
    }
}
