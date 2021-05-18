<?php

use ludk\Persistence\ORM;
use Entity\Build;
use Entity\User;

$ORM = new ORM(__DIR__ . '/../../Resources');
$buildRepo = $ORM->getRepository(Build::class);
$userRepo = $ORM->getRepository(User::class);

$manager = $ORM->getManager();
