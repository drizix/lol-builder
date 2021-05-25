<?php

namespace Controller;

class AuthController
{
    public function login()
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userId = GetUserIdFromUserAndPassword($_POST['username'], $_POST['password']);
            if ($userId > 0) {
                $_SESSION['userId'] = $userId;
                header('Location: display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../src/view/DisplayBuild.php";
            }
        } else {
            include "../src/view/DisplayBuild.php";
        }
    }

    public function logout()
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: display');
    }

    public function register()
    {
        include "../src/model/UserManager.php";
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            if (IsNicknameFree($_POST['username'])) {
                $errorMsg = "Nickname already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../src/view/RegisterForm.php";
            } else {
                $userId = CreateNewUser($_POST['username'], $_POST['password']);
                $_SESSION['userId'] = $userId;
                header('Location: display');
            }
        } else {
            include "../src/view/RegisterForm.php";
        }
    }
}
