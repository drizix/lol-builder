<?php

//LISTING 
$file = "jsonData/champion.json";
$fileItem = "jsonData/item.json";

$data = file_get_contents($file);
$dataItem =  file_get_contents($fileItem);
$obj = json_decode($data);
$objItem = json_decode($dataItem);

$route = "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/";

$routeItem = "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/";
// var_dump($obj->data->Aatrox->name);

$dataObj = $obj->data;
$dataObjItem = $objItem->data;
// var_dump($dataObj);
foreach ($dataObj as $value) {
    $url = $route . $value->image->full;
    echo "<img src=" . $url . ">";
}

foreach ($dataObjItem as $value) {
    // var_dump($value->image->full);
    $url = $routeItem . $value->image->full;
    // echo "<img src=" . $url . ">";
}

function getChampionByName($name, $objet)
{
    foreach ($objet as $value) {
        if ($value->name == $name) {
            return $value;
        }
    }
}

function getChampionByRole($role, $objet)
{
    $result = [];
    foreach ($objet as $value) {
        if ($value->tags[0] == $role) {
            array_push($result, $value);
        }
    }
    return $result;
}

function displayChampionByArray($array)
{
    foreach ($array as $data) {
        echo "<img src=" . "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/" . $data->image->full . ">";
    }
}
// var_dump(getChampionByName("Aatrox", $dataObj));
// var_dump(getChampionByRole("Fighter", $dataObj));
// displayChampionByArray(getChampionByRole("Fighter", $dataObj));

// echo "<select>";
// foreach ($dataObj as $value) {
//     $url = $route . $value->image->full;
//     // echo "<option value =" . $url . ">" . $value->name . "</option>";
//     echo "<option style =\"background-image: url('" . $url . "'); width:100px; height:100px;\" value =" . $url . " ></option>";
//     //  echo "<img src=" . $url . ">";
// }
// echo "</select>";

// echo "<table><tr><ul>";
// foreach ($dataObj as $value) {
//     $url = $route . $value->image->full;
//     // echo "<option value =" . $url . ">" . $value->name . "</option>";
//     echo "<li><img class=\"img-fluid rounded\" src=" . $url . "></li>";
//     //  echo "<img src=" . $url . ">";
// }
// echo "</table></tr></ul>";

// for ($i = 0; $i < 7; $i++) {
//     echo "<select>";
//     foreach ($dataObjItem as $value) {
//         $url = $routeItem . $value->image->full;
//         echo "<option value =" . $url . ">" . $value->name . "</option>";
//         //  echo "<img src=" . $url . ">";
//     }
//     echo "</select>";
// };
