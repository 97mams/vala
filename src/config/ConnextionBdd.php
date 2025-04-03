<?php

namespace App\config;

class ConnextionBdd 
{
  private static string $dbName = 'fiompina';
  private static string $host = '127.0.0.1';
  private static string $pwd = '';
  private static string $user = 'root';

  public function __construct(
  ){}

  public static function connect() 
  {
    $dsn = "mysql:dbname=".self::$dbName . ";host=". self::$host ;
    try {
      $connect = new \PDO($dsn, self::$user, self::$pwd);
    } 
    catch (\PDOException $th) {
      echo $th->getMessage();
    }

    return $connect;
  }

}