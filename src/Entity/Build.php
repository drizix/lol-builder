<?php

namespace Entity;

use ludk\Utils\Serializer;

class Build
{
    public $id;
    public $name;
    public $creator;
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

    // function __construct($name, $creator, $champion, $summonerSpell1, $summonerSpell2, $item1, $item2, $item3, $item4, $item5, $item6, $item7)
    // {
    //     $this->name = $name;
    //     $this->creator = $creator;
    //     $this->champion = $champion;
    //     $this->summonerSpell1 = $summonerSpell1;
    //     $this->summonerSpell2 = $summonerSpell2;
    //     $this->item1 = $item1;
    //     $this->item2 = $item2;
    //     $this->item3 = $item3;
    //     $this->item4 = $item4;
    //     $this->item5 = $item5;
    //     $this->item6 = $item6;
    //     $this->item7 = $item7;
    // }
}
