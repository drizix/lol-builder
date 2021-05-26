<?php

namespace Controller;

use Entity\Build;
use Entity\Champion;
use Entity\User;
use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;

class ContentController extends AbstractController
{
    public function create(Request $request): Response
    {
        include "../src/model/UserManager.php";
        include "../src/model/BuildManager.php";
        if (
            // isset($_SESSION['userId'])
            $request->getSession()->has('userId')
            && $request->request->has('nameBuild')
            && $request->request->has('champion')
            && $request->request->has('summonerSpell1')
            && $request->request->has('summonerSpell2')
            && $request->request->has('item1')
            && $request->request->has('item2')
            && $request->request->has('item3')
            && $request->request->has('item4')
            && $request->request->has('item5')
            && $request->request->has('item6')
            && $request->request->has('item7')
        ) {
            $newBuild = new Build;
            $newChampion = new Champion;
            $infoUser = new User;

            $newBuild->champion = $request->request->get('champion');
            $newBuild->nameBuild = $request->request->get('nameBuild');

            $infoUser->getNicknameById($request->getSession()->get('userId'));
            // $infoUser->getNicknameById($_SESSION['userId']);
            $newBuild->user = $infoUser;

            $newBuild->splash = $newChampion->getchampionSplashUrlByName($request->request->get('champion'));
            $newBuild->summonerSpell1 = $request->request->get('summonerSpell1');
            $newBuild->summonerSpell2 = $request->request->get('summonerSpell2');
            $newBuild->item1 = $request->request->get('item1');
            $newBuild->item2 = $request->request->get('item2');
            $newBuild->item3 = $request->request->get('item3');
            $newBuild->item4 = $request->request->get('item4');
            $newBuild->item5 = $request->request->get('item5');
            $newBuild->item6 = $request->request->get('item6');
            $newBuild->item7 = $request->request->get('item7');

            $manager->persist($newBuild);
            $manager->flush();

            // header('Location: /display');
            $data = ["items" => $items];
            return $this->render('DisplayBuild.php', $data);
            $this->redirectToRoute('display');
        } else {
            // include "../src/view/NewBuildForm.php";
            return $this->render('NewBuildForm.php');
        }
    }
}
