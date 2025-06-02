<h1 class="font-bold leading-7 [&:not(:first-child)]:mt-6"># notification</h1>

<?php

use App\controller\NotificationController;

  $controller    = new NotificationController();
  $notifications = $controller->index();

  foreach ($notifications as $notification) {
    echo '
    <div class="border border-gray-300 px-3 text-sm ">
      <p>'.$notification['nom'].'</p>
      <p>'.$notification['description'].'</p>
    </div>
    ';
  }
?>