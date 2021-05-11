<?php

namespace Entity;

class Item
{
    private $id;
    private $name;
    private $image;

    function getImageById($id)
    {
        return "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/" . $id . ".png";
    }
}
