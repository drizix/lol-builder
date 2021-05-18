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

    function createMenuSummoner($id)
    {
        $url = "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/";

        $orm = new ORM(__DIR__ . '/../Resources');
        $codeRepo = $orm->getRepository(Summoner::class);
        $items = $codeRepo->findAll();
        $data = $items[0]->data;
        $result = "";
        $result .= "<select class=\"form-select\" id=\"summonerSpell" . $id . "\" name=\"summonerSpell" . $id . "\" aria-label=\"Default select example\">";
        $result .= "<option selected>choisissez votre sort d'invocateur</option>";
        foreach ($data as $key) {
            $endUrl = $key['image']['full'];
            $fullUrl = $url . $endUrl;
            $result .= "<option value=\"" . $fullUrl . "\">" . $key['name'] . "</option>";
        }
        $result .= "</select>";

        return $result;
    }
}
