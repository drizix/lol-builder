<?php

use Entity\User;

include_once "ORM.php";

function GetOneUserFromId($id)
{
}

function GetAllUsers()
{
    global $ORM;
    $userRepo = $ORM->getRepository(User::class);
    $user = $userRepo->findAll();
    var_dump($user);
}

function GetUserIdFromUserAndPassword($nickname, $password)
{
    global $ORM;
    $userRepo = $ORM->getRepository(User::class);
    $user = $userRepo->findBy(array("nickname" => $nickname, "password" => $password));

    if ($user) {
        return $user[0]->id;
    } else {
        return false;
    }
}

function IsNicknameFree($nickname)
{
    global $ORM;
    $userRepo = $ORM->getRepository(User::class);
    $user = $userRepo->findBy(array("nickname" => $nickname));
    var_dump($user);
    return $user;
}

function CreateNewUser($nickname, $password)
{
    global $ORM;
    // $userRepo = $ORM->getRepository(User::class);
    $manager = $ORM->getManager();

    $newUser = new User();
    $newUser->nickname = $nickname;
    $newUser->password = $password;
    $manager->persist($newUser);
    $manager->flush();
    return $newUser->id;
}
