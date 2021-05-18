<?php

use Entity\User;

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
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
                header('Location: ?action=display');
            }
        } else {
            include "../src/view/RegisterForm.php";
        }
        break;
    case 'logout':
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userId = GetUserIdFromUserAndPassword($_POST['username'], $_POST['password']);
            if ($userId > 0) {
                var_dump($_SESSION);
                $_SESSION['userId'] = $userId;

                header('Location: ?action=display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../src/view/DisplayBuild.php";
            }
        } else {
            include "../src/view/DisplayBuild.php";
        }
        break;
    case 'new':
        break;
    case 'display':
    default:
        include "../src/model/BuildManager.php";
        include "../src/view/DisplayBuild.php";
        break;
}
