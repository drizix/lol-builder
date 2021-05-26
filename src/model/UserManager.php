<?php

namespace model;

use Entity\User;
use ludk\Controller\AbstractController;

class UserManager extends AbstractController
{
    function GetUserIdFromUserAndPassword($nickname, $password)
    {
        // $ORM = new ORM(__DIR__ . '/../../Resources');
        // $userRepo = $ORM->getRepository(User::class);

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
        // $ORM = new ORM(__DIR__ . '/../../Resources');
        // $userRepo = $ORM->getRepository(User::class);

        $userRepo = $this->getOrm()->getRepository(User::class);

        $user = $userRepo->findBy(array("nickname" => $nickname));
        return $user;
    }

    function CreateNewUser($nickname, $password)
    {
        // $ORM = new ORM(__DIR__ . '/../../Resources');
        // $manager = $ORM->getManager();

        $manager = $this->getOrm()->getManager();

        $newUser = new User();
        $newUser->nickname = $nickname;
        $newUser->password = $password;
        $manager->persist($newUser);
        $manager->flush();
        return $newUser->id;
    }
}
