<?php

namespace App\controller;

use App\model\NotificationModel;
use Symfony\Component\HttpFoundation\Request;

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

  /**
   * notification register
   * @param Request $request
   * @return void
   */
  public function store(Request $request): void
  {
    $this->model->store($request);
  }

}