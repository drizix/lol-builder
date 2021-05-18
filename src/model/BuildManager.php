<?php
include_once "ORM.php";

$items = array();
if (isset($_GET['search'])) {
    $strToSearch = $_GET['search'];
    if (strpos($strToSearch, "@") === 0) {
        $userName = substr($strToSearch, 1);
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

function createNewBuild($userId, $buildId)
{
}
