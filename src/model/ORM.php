<?php

namespace model;

use Entity\Build;
use Entity\User;

$buildRepo = $this->getOrm()->getRepository(Build::class);
$userRepo = $this->getOrm()->getRepository(User::class);
$manager = $this->getOrm()->getManager();
