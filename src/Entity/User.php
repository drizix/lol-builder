<?php

namespace Entity;

use ludk\Utils\Serializer;
use ludk\Persistence\ORM;

class User
{
    public $id;
    public $nickname;
    public $password;
    use Serializer;

    function getNicknameById($id)
    {
        $ORM = new ORM(__DIR__ . '/../../Resources');
        $userRepo = $ORM->getRepository(User::class);
        $user = $userRepo->findBy(array("id" => $id));
        return $user[0]->nickname;
    }
}
