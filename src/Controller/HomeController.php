<?php

namespace Controller;

use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
        include "../src/model/BuildManager.php";
        // include "../src/view/DisplayBuild.php";
        return $this->render('DisplayBuild.php');
    }
}
