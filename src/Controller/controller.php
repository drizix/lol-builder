<?php

use Entity\Build;
use Entity\Champion;
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
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (
            isset($_SESSION['userId'])
            && isset($_POST['nameBuild'])
            && isset($_POST['champion'])
            && isset($_POST['summonerSpell1'])
            && isset($_POST['summonerSpell2'])
            && isset($_POST['item1'])
            && isset($_POST['item2'])
            && isset($_POST['item3'])
            && isset($_POST['item4'])
            && isset($_POST['item5'])
            && isset($_POST['item6'])
            && isset($_POST['item7'])
        ) {
            $newBuild = new Build;
            $newChampion = new Champion;
            $infoUser = new User;

            $newBuild->champion = $_POST['champion'];
            $newBuild->nameBuild = $_POST['nameBuild'];
            $newBuild->user = $infoUser;
            $newBuild->splash = $newChampion->getchampionSplashUrlByName($_POST['champion']);
            $newBuild->summonerSpell1 = $_POST['summonerSpell1'];
            $newBuild->summonerSpell2 = $_POST['summonerSpell2'];
            $newBuild->item1 = $_POST['item1'];
            $newBuild->item2 = $_POST['item2'];
            $newBuild->item3 = $_POST['item3'];
            $newBuild->item4 = $_POST['item4'];
            $newBuild->item5 = $_POST['item5'];
            $newBuild->item6 = $_POST['item6'];
            $newBuild->item7 = $_POST['item7'];

            $manager->persist($newBuild);
            $manager->flush();

            header('Location: ?action=display');
        } else {
            include "../src/view/NewBuildForm.php";
        }
        break;
    case 'display':
    default:
        include "../src/model/BuildManager.php";
        include "../src/view/DisplayBuild.php";
        break;
}
