<?php

namespace Entity;

use ludk\Utils\Serializer;
use ludk\Persistence\ORM;

class Champion
{
    private $id;
    private $type;
    private $format;
    private $version;
    private $data;
    use Serializer;

    function getAllChampionArray()
    {
        $championArray = [];
        $orm = new ORM(__DIR__ . '/../Resources');
        $codeRepo = $orm->getRepository(Champion::class);
        $items = $codeRepo->findAll();
        $data = $items[0]->data;

        foreach ($data as $champ) {
            array_push($championArray, $champ['name']);
        };

        return $championArray;
    }
}
