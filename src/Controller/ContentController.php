<?php

namespace Controller;

use Entity\Build;
use Entity\Champion;
use Entity\User;

class ContentController
{
    public function new()
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (
            isset($_SESSION['userId'])
            && isset($_POST['nameBuild'])
            && isset($_POST['champion'])
            && isset($_POST['summonerSpell1'])
            && isset($_POST['summonerSpell2'])
            && isset($_POST['item1'])
            && isset($_POST['item2'])
            && isset($_POST['item3'])
            && isset($_POST['item4'])
            && isset($_POST['item5'])
            && isset($_POST['item6'])
            && isset($_POST['item7'])
        ) {
            $newBuild = new Build;
            $newChampion = new Champion;
            $infoUser = new User;

            $newBuild->champion = $_POST['champion'];
            $newBuild->nameBuild = $_POST['nameBuild'];
            $newBuild->user = $infoUser;
            $newBuild->splash = $newChampion->getchampionSplashUrlByName($_POST['champion']);
            $newBuild->summonerSpell1 = $_POST['summonerSpell1'];
            $newBuild->summonerSpell2 = $_POST['summonerSpell2'];
            $newBuild->item1 = $_POST['item1'];
            $newBuild->item2 = $_POST['item2'];
            $newBuild->item3 = $_POST['item3'];
            $newBuild->item4 = $_POST['item4'];
            $newBuild->item5 = $_POST['item5'];
            $newBuild->item6 = $_POST['item6'];
            $newBuild->item7 = $_POST['item7'];

            $manager->persist($newBuild);
            $manager->flush();

            header('Location: ?action=display');
        } else {
            include "../src/view/NewBuildForm.php";
        }
    }
}
