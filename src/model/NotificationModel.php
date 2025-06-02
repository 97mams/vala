<?php

namespace App\model;

use App\config\ConnextionBdd;

class NotificationModel
{
  private \PDO $connectDb;
  
  public function __construct()
  {
    $this->$connectDb = ConnectionDB;
  }
}