<?php

namespace model;

use Entity\User;
use ludk\Controller\AbstractController;

class UserManager extends AbstractController
{
    function GetUserIdFromUserAndPassword($nickname, $password)
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $user = $userRepo->findBy(array("nickname" => $nickname, "password" => $password));

        if ($user) {
            return $user[0]->id;
        } else {
            return false;
        }
    }

    function IsNicknameFree($nickname)
    {
        $userRepo = $this->getOrm()->getRepository(User::class);

        $user = $userRepo->findBy(array("nickname" => $nickname));
        return $user;
    }

    function CreateNewUser($nickname, $password)
    {
        $manager = $this->getOrm()->getManager();

        $newUser = new User();
        $newUser->nickname = $nickname;
        $newUser->password = $password;
        $manager->persist($newUser);
        $manager->flush();
        return $newUser->id;
    }
}
