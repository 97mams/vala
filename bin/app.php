#! /usr/bin/env php
<?php declare(strict_types=1);

use App\CLI\CommandDoc;
use App\CLI\Db;
use App\seed\GenreSeed;

require __DIR__."./../vendor/autoload.php";

$default  = new CommandDoc();
$database = new Db();
$seed     = new GenreSeed($database);
$command  = $argv[1] ?? null;
$arg1     = $argv[2] ?? null;

match ($command) {
  "db:create" => $database->createDatabase(),
  "db:table"  => $database->createTable($arg1),
  "seed:run"  => $seed->seed(),
  default     => $default->get()
};
