<?php

namespace Entity;

use ludk\Utils\Serializer;
use ludk\Persistence\ORM;

class Champion
{
    public $id;
    private $type;
    private $format;
    private $version;
    private $data;
    use Serializer;

    // output : array
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

    // input : array | output : string
    function createMenuChampion()
    {
        $url = "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/";

        $orm = new ORM(__DIR__ . '/../Resources');
        $codeRepo = $orm->getRepository(Champion::class);
        $items = $codeRepo->findAll();
        $data = $items[0]->data;
        $result = "";
        $result .= "<select class=\"form-select\" id=\"champion\" name=\"champion\" aria-label=\"Default select example\">";
        $result .= "<option selected>choisissez votre champion</option>";
        foreach ($data as $key) {
            $endUrl = $key['image']['full'];
            $fullUrl = $url . $endUrl;
            $result .= "<option value=\"" . $fullUrl . "\">" . $key['name'] . "</option>";
        }
        $result .= "</select>";

        return $result;
    }

    function getchampionSplashUrlByName($name)
    {

        $route = "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/";
        $newUrl = str_replace("http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/", $route, $name);
        $newUrlExt = str_replace(".png", "_0.jpg", $newUrl);
        return $newUrlExt;
    }
}
