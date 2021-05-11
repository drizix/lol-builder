<?php

namespace Entity;

use ludk\Utils\Serializer;
use ludk\Persistence\ORM;

class Summoner
{
    public $id;
    private $type;
    private $version;
    private $data;

    use Serializer;

    function getAllSuummonerArray()
    {
        $itemArray = [];
        $orm = new ORM(__DIR__ . '/../Resources');
        $codeRepo = $orm->getRepository(Summoner::class);
        $items = $codeRepo->findAll();
        $data = $items[0]->data;
        foreach ($data as $item) {
            array_push($itemArray, $item['name']);
        };
        return $itemArray;
    }
}
