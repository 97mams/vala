<?php

namespace App\model;

use App\config\ConnextionBdd;

class NotificationModel
{
  private \PDO $connectDb;
  
  public function __construct()
  {
    $this->connectDb = ConnextionBdd::connect();
  }

  public function index ():array
  {
    $query = $this->connectDb
                  ->query("SELECT * FROM notification");
    return $query->fetchAll();
  }
}