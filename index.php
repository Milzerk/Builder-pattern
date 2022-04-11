<?php

use App\builders\CompoundBuild;

require_once "vendor/autoload.php";

function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    echo '</pre>';
    die();
}

function printJson(array $json)
{
    echo json_encode($json, JSON_PRETTY_PRINT);
    exit;
}

$builder = new CompoundBuild();

$builder->bool()->must()
    ->term('name', 'test')
    ->term('name', 'test2');

$builder->bool()->must()->term('idade', 23);

$must = $builder->bool()->must();
$must->term('idade12', 24);
$must->term('idad', 246);
$must->term('idade4', 247);


$builder->bool()->mustNot()->term('name2', 'test')->term('name1', 'test2');
$builder->must();


printJson($builder->builder());
dd($builder);
$builder->builder();

