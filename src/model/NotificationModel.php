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

  public function index ():array
  {
    $query = $this->connectDb
                  ->query("SELECT * FROM notification");
    return $query->fetchAll();
  }

  public function store(Request $request):void
  {
    $name       = $request->get('name');
    $description= $request->get('description');
    $status     = $request->get('status');
    $date       = date("y-m-d H:m:s");
    $this->connectDb
         ->query('INSERT INTO notification (nom, description, status, created_at, updated_at) VALUES("'.$name.'", "'.$description.'" ,"'.$status.'", "'.$date.'", "'.$date.'")');
  }
}