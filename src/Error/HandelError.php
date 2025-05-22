<?php

namespace App\Error;

use Error;

/**
 * catch all error
 */
class HandelError extends Error
{
  public static function get(Object $error):string
  {
    $result = "";
    if($error instanceof \PDOException){
      $result = '
      <div style="border:red 1px solid; border-raduis: 5px">
        <p class="text-red-400 leading-7 [&:not(:first-child)]:mt-6"> Start your mysql server.</p>
      </div>';
    }

    return $result;
  }

} 