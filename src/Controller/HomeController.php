<?php

namespace Controller;

class HomeController
{
    public function display()
    {
        include "../src/model/BuildManager.php";
        include "../src/view/DisplayBuild.php";
    }
}
