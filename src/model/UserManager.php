<?php

use Entity\User;
use ludk\Persistence\ORM;

function GetUserIdFromUserAndPassword($nickname, $password)
{
    $ORM = new ORM(__DIR__ . '/../../Resources');
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
    $ORM = new ORM(__DIR__ . '/../../Resources');

    $userRepo = $ORM->getRepository(User::class);
    $user = $userRepo->findBy(array("nickname" => $nickname));
    return $user;
}

function CreateNewUser($nickname, $password)
{
    $ORM = new ORM(__DIR__ . '/../../Resources');
    $manager = $ORM->getManager();

    $newUser = new User();
    $newUser->nickname = $nickname;
    $newUser->password = $password;
    $manager->persist($newUser);
    $manager->flush();
    return $newUser->id;
}
