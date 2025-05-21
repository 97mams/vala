<?php

namespace App\config;

use App\Error\HandelError;

class ConnextionBdd 
{
  private static $instance = null;

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
      return $connect;
    } 
    catch (\PDOException $th) {
      echo HandelError::get($th);
    }

  }

  public static function getInstance():\PDO
  {
    if (!self::$instance) {
      self::connect();
    }
    return self::$instance;
  }

}