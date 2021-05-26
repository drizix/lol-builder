<?php

namespace Entity;

use ludk\Utils\Serializer;

class Build
{
    public $id;
    public $nameBuild;
    public User $user;
    public $champion;
    public $splash;
    public $summonerSpell1;
    public $summonerSpell2;
    public $item1;
    public $item2;
    public $item3;
    public $item4;
    public $item5;
    public $item6;
    public $item7;

    use Serializer;
}
