<?php

namespace App\controller;

use App\model\NotificationModel;

class NotificationController
{
  private NotificationModel $model;

  public function __construct()
  {
    $this->model = new NotificationModel();
  }

  /**
   * get all notification
   * @return array
   */
  public function index():array
  {
    return $this->model->index();
  }

}