<?php

namespace App\model;

use App\config\ConnextionBdd;
use App\entity\Notification;
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
    $title       = $request->get('title');
    $nameAnimal  = $request->get('name_animal');
    $status      = $request->get('status');
    $recallDay   = $request->get('date_rappel');
    $date        = date("y-m-d H:m:s");
    $notification= new Notification($nameAnimal);
    $notification->setDescription($title, $recallDay);
    $description = $notification->getDescription();

    try {
      $this->connectDb
           ->query('INSERT INTO notification (nom, description, status, created_at, updated_at, date_rappel) VALUES("'.$title.'", "'.$description.'" ,"'.$status.'", "'.$date.'", "'.$date.'", "'.$recallDay.'")');
      } catch (\PDOException $th) {
      echo $th;
    }
  }
}