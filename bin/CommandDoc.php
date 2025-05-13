<?php

namespace App\CLI;
/**
 * documments CLI
 */
class CommandDoc
{

  /**
   * show all commands exist
   * @return void
   */
  public function get():void
  {
    echo "\033[32m db:create \033[0m ........................... create database\n";
    echo "\e[0;32m db:table  \033[0m ........................... create table \n";
    echo "\e[0;32m seed:run [nameSeed] \033[0m ................. run seeder \n";
  }

}