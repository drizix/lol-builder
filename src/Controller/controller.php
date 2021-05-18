<?php

use Entity\User;

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        include "../src/view/RegisterForm.php";
        break;
    case 'logout':
        break;
    case 'login':
        break;
    case 'new':
        break;
    case 'display':
    default:
        include "../src/model/BuildManager.php";
        $items = array();
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
            if (strpos($strToSearch, "@") === 0) {
                $userName = substr($strToSearch, 1);
                $userRepo = $orm->getRepository(User::class);
                $users = $userRepo->findBy(array("nickname" => $userName));
                if (count($users) == 1) {
                    $items = $buildRepo->findBy(array("user" => $users[0]->id));
                }
            } else {
                $items = $buildRepo->findBy(array("content" => "%$strToSearch%"));
            }
        } else {
            $items = $buildRepo->findAll();
        }
        include "../src/view/DisplayBuild.php";
        break;
}
