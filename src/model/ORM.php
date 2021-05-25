<?php

use Entity\Build;
use Entity\User;

// $ORM = new ORM(__DIR__ . '/../../Resources');
// $buildRepo = $ORM->getRepository(Build::class);
// $userRepo = $ORM->getRepository(User::class);

$buildRepo = $this->getOrm()->getRepository(Build::class);
$userRepo = $this->getOrm()->getRepository(User::class);
$manager = $this->getOrm()->getManager();
