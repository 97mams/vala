<?php

namespace App\model;

use App\config\ConnextionBdd;
use App\entity\Notification;
use Error;
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
    $title       = $request->get('nom_traitement');
    $nameAnimal  = $request->get('nom_animale');
    $status      = $request->get('status');
    $recallDay   = $request->get('date_rappel');
    $date        = date("y-m-d H:m:s");
    $notification= new Notification($title);
    $notification->setDescription((string)$nameAnimal, $recallDay);
    $description = $notification->getDescription();

    try {
      $this->connectDb
           ->query('INSERT INTO notification (titre, description, status, created_at, updated_at, date_rappel) VALUES("'.$title.'", "'.$description.'" ,"'.$status.'", "'.$date.'", "'.$date.'", "'.$recallDay.'")');
      } catch (\PDOException $th) {
      throw new Error($th);
    }
  }
}