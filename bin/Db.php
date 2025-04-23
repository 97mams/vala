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
      exit;
    }
    echo "-> Database allready exiting !";
  }

  /**
   * create an column reccord
   * @param string $tableName
   */
  public function createTable(string $tableName):void
  {
    $fields = $this->handleField();
    $entity = "";
    foreach ($fields as $field) {
      $entity .= $field['name']." ".$field['type']."(".$field['size'].") NOT NULL, ";
    }
    $query = "CREATE TABLE $tableName (id_".$tableName." int(11) NOT NULL AUTO_INCREMENT, ".$entity ." PRIMARY KEY(id_".$tableName."))";
    $pdo = $this->connect();
    $pdo->query($query);
  }
  
  /**
   * many fields
   * @return []
   */
  private function handleField() : array 
  {
    $field =[$this->field()];
    while ($this->isContunous()) {
        $field[] = $this->field();
    }
    return $field;
  }
  
  /**
   * build an array for name field type ande size
   * @return []
   */
  private function field(): array
  {
    $name   = (string)readline('Nom du champ: ');
    $type   = readline('Type: ');
    $size   = (int)readline('Taille: ');
    return [
             'name' => $name, 
             'type' => $type, 
             'size' => $size
            ];
  }
  
  /**
   * check for add other column
   * @return bool
   */
  private function isContunous():bool
  {
    echo "Entre plus de champs ? Tapez 'oui' si on continue sinon tapez sur Entrer";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    if (trim($line) == 'oui') {
      return true;
    }
    return false;
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