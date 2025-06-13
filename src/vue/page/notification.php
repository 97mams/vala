<?php

use App\controller\NotificationController;

  $controller    = new NotificationController();
  $notifications = $controller->index();

  foreach ($notifications as $notification) {
    echo '
    <div class="border-t border-gray-300 px-3 text-sm hover:bg-gray-200 cursor-pointer overflow-auto">
      <p>'.$notification['titre'].'</p>
      <p>'.$notification['description'].'</p>
    </div>
    ';
  }
?>