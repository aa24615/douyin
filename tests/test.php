<?php

require '../vendor/autoload.php';



use Php127\Douyin\Factory;

//Douyin::url("https://v.douyin.com/eeYy4Yo/");


$app = Factory::douyin("https://v.douyin.com/eeYy4Yo/");

$data = $app->getData();

print_r($data);
