<?php

namespace App\entity;

class Notification
{

  public function __construct(
    private string $title = "", 
    private string $description = "",
    private int $status = 0
  )
  {}

  public function getTitle():string
  {
    return $this->title;
  }

  public function setTitle(string $title):void
  {
    $this->title = $title;
  }

  public function getDescription():string
  {
    return $this->description;
  }

  public function setDescription(string $name, string $date):void
  {
    $this->description = $this->NotificationMessage($name, $date);
  }

  public function getStatus():string
  {
    return $this->status;
  }

  public function setStatus(string $status):void
  {
    $this->status = $status;
  }

  private function NotificationMessage($name, $date):string
  {
    $sentence = ucfirst($name) ." peut faire du " . $this->title ." le ". $date;
    return $sentence;
  }

}