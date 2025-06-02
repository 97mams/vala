<?php

namespace App\model;

use App\config\ConnextionBdd;
use Symfony\Component\HttpFoundation\Request;

class NotificationModel
{
  private \PDO $connectDb;
  
  public function __construct()
  {
    $this->connectDb = ConnextionBdd::connect();
  }

  public function index ()
  {
    try {
      $query = $this->connectDb
                    ->query("SELECT * FROM notification");
      return $query->fetchAll();
    } catch (\PDOException $th) {
      echo $th;
    }
  }

  public function store(Request $request):void
  {
    $name       = $request->get('name');
    $description= $request->get('description');
    $status     = $request->get('status');
    $date       = date("y-m-d H:m:s");

    try {
      $this->connectDb
           ->query('INSERT INTO notification (nom, description, status, created_at, updated_at) VALUES("'.$name.'", "'.$description.'" ,"'.$status.'", "'.$date.'", "'.$date.'")');
      } catch (\PDOException $th) {
      echo $th;
    }
  }
}