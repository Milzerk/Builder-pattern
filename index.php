<?php

use App\builders\Roles;

require_once "vendor/autoload.php";

$regra = new Roles;

$regra->should()
->equals()
->should()
->must()
->should()
->must();

echo json_encode($regra->buildArray());