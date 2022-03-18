<?php

use App\builders\Roles;
use App\elasticBuilders\Must;

require_once "vendor/autoload.php";

$regra = new Roles;

// $regra->must()->bool()->equals();
$regra->must(
    $regra->bool(
        $regra->must(
            // $regra->match('nome', 'João'),
            // $regra->match('nome', 'pedro'),

        )
    ),
    $regra->bool(
        $regra->must()
    ),
);

// $regra->builder()->bool(
//     $regra->must(
//         $regra->equals(
//             $regra->match('nome', 'Miller'),
//             // $regra->match('idade', 25),
//             // $regra->match('data', '2019-01-01'),
//         )
//     )
// );

// $regra
//     ->bool()
//         ->should()
//             ->equals()
//                 ->match('nome', 'teste')
//                 ->match('nome', 'teste2')
//             ->end()
//         ->end()
//         ->must()
//             ->equals()
//                 ->match('nome', 'teste')
//                 ->match('nome', 'teste2')
//             ->end()
//         ->end()
//     ->end();

echo json_encode($regra->buildArray());