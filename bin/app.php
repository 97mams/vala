#! /usr/bin/env php
<?php

use App\CLI\Db;
use App\seed\GenreSeed;

require "./vendor/autoload.php";

$database = new Db();
$seed = new GenreSeed();
$command = $argv[1] ?? null;
$arg1    = $argv[2] ?? null;

match ($command) {
  "db:create" => $database->createDatabase(),
  "db:table" => $database->createTable($arg1),
  "seed:run" => $seed->seed(),
  default => print "command is not matching"
};
