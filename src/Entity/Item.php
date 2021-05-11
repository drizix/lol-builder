<?php

namespace Entity;

use ludk\Utils\Serializer;
use ludk\Persistence\ORM;

class Item
{

    public $id;
    private $type;
    private $version;
    private $basic;
    private $data;
    private $groups;
    private $tree;

    use Serializer;

    function getImageById($id)
    {
        return "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/" . $id . ".png";
    }

    function getAllItemArray()
    {
        $itemArray = [];
        $orm = new ORM(__DIR__ . '/../Resources');
        $codeRepo = $orm->getRepository(Item::class);
        $items = $codeRepo->findAll();
        $data = $items[0]->data;
        foreach ($data as $item) {
            array_push($itemArray, $item['name']);
        };
        return $itemArray;
    }
}
