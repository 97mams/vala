<?php

namespace App\CLI;

class Db
{

  private string $dbName;
  private string $dbUser;
  private string $dbPwd;
  private string $dbHost;
  private \PDO $pdo;
  private array $env;
 
  public function __construct()
  {
    $this->env = parse_ini_file('.env');
    $this->dbName = $this->databaseName();
    $this->dbUser = $this->databaseUser();
    $this->dbHost = $this->databaseHost();
    $this->dbPwd = $this->databasePassword();
    $this->pdo = $this->connect();
  }

  public function createDatabase():void
  {

    if(!$this->verfiDatabaseExit()) {
      $this
        ->pdo
        ->query('CREATE DATABASE ' . $this->databaseName());
      echo "-> " .$this->databaseName() ." created successfully";
    }
    echo "-> Database allready exiting !";
  }
  
  private function verfiDatabaseExit(): bool
  {
    $statement = $this->pdo->query('SHOW DATABASES LIKE "'.$this->databaseName().'"');
    return $statement->fetch();
  }

  /**
   * connect database with PDO
   * @return \PDO
   */
  private function connect():\PDO
  {
    $dsn = "mysql:host=". $this->dbHost ;
    return new \PDO($dsn, $this->dbUser, $this->dbPwd);
  }

  /**
   * get name database in env
   * @return String dbName
   */
  private function databaseName():string
  {
    return $this->env['DB_NAME'];
  }

  /**
   * get host name in env
   * @return String dbHost
   */
  private function databaseHost():string
  {
    return $this->env['DB_HOST'];
  }

  /**
   * get user database in env
   * @return String dbUser
   */
  private function databaseUser():string
  {
    return $this->env['DB_USER'];
  }

  /**
   * get database password in env
   * @return String dbPwd
   */
  private function databasePassword():string
  {
    return $this->env['DB_PASSWORD'];
  }

}