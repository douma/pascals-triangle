<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$command = new \PascalsTriangle\Command(new \PascalsTriangle\Triangle());
$command->run();
