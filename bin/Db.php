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
      echo "-> \e[0;37;42m " .$this->databaseName() ." created successfully \e[0m ";
      exit;
    }
    echo "-> \e[0;33m Database already exiting ! \e[0m";
  }

  /**
   * create an column reccord
   * @param string $tableName
   */
  public function createTable(string $tableName):void
  {
    $this->isDatabase();
    $query  = "";
    $fields = $this->handleField();
    $pdo    = $this->connect();
    $entity = "";
    foreach ($fields as $field) {
      $entity .= $field['name']." ".$field['type']."(".$field['size'].") NOT NULL, ";
    }
    if(!$this->isTable($tableName)) {
      $query = "CREATE TABLE ".$this->databaseName().".".$tableName ." (id_".$tableName." int(11) NOT NULL AUTO_INCREMENT, ".$entity ." created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id_".$tableName."))";
    } else {
      $query = "ALTER TABLE ".$this->databaseName().".".$tableName ." ADD ".substr(trim($entity),0,-1);
    }
    $pdo->query($query);
  }

  /**
   * check table exist
   * @param $tableName
   * @return bool   
   */
  private function isTable($tableName):bool
  {
    $table = $this->connect()
                  ->query("SELECT TABLE_NAME 
                            FROM INFORMATION_SCHEMA.TABLES 
                            WHERE TABLE_SCHEMA = '".$this->databaseName()."' 
                            AND TABLE_NAME = '".$tableName."'
                          ")
                  ->fetch();
    if(!$table) {
      return false;
    }
    return true;
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
    echo "Tapez \e[45m'oui'\e[0m si on continue sinon tapez sur Entrer: \n";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    if (trim($line) == 'oui') {
      return true;
    }
    return false;
  }

  /**
   * chech of matching database
   * @return void
   */
  private function isDatabase()
  {
    if (!$this->verfiDatabaseExit()) {
      echo "\033[31m Alert: database not found .\033[0m \n";
      echo "\n";
      echo "follow this command:\e[0;37;42m php bin/app.php db:create \e[0m \n";
      exit;
    }
  }
  /**
   * check database exist
   * @return bool 
   */
  private function verfiDatabaseExit(): bool
  {
    $statement = $this->pdo->query('SHOW DATABASES LIKE "'.$this->databaseName().'"');
    if(!$statement->fetch()){
      return false;
    }
    return true;
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