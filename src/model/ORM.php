<?php

use ludk\Persistence\ORM;
use Entity\Build;

$orm = new ORM(__DIR__ . '/../../Resources');
$buildRepo = $orm->getRepository(Build::class);
