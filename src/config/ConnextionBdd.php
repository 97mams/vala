<?php

namespace App\config;

class ConnextionBdd 
{
  
  function __construct()
  {
  }
  
  public static function connect() 
  {
    $env = parse_ini_file('../.env');
    $dbName = $env['DB_NAME'];
    $host = $env['DB_HOST'];
    $user = $env['DB_USER'];
    $pwd = $env['DB_PASSWORD'];
    $dsn = "mysql:dbname=" . $dbName . ";host=".$host ;
    try {
      $connect = new \PDO($dsn, $user, $pwd);
    } 
    catch (\PDOException $th) {
      echo $th->getMessage();
    }

    return $connect;
  }

}