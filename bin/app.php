#! /usr/bin/env php
<?php

use App\CLI\Db;

require "./vendor/autoload.php";

$database = new Db();

$command = $argv[1] ?? null;
$arg1    = $argv[2] ?? null;

match ($command) {
  "db:create" => $database->createDatabase(),
   default => print "command is not matching"
};
