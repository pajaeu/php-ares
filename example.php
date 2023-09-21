<?php

use Ares\Provider;

require __DIR__ . '/vendor/autoload.php';

$ares = new Provider();

try{
    $company = $ares->getByIco('PASTE-ICO-HERE');

    var_dump($company);
} catch (Exception $exception){
    echo $exception->getMessage();
}