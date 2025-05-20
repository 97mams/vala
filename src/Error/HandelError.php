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
      <div class="bg-red-100 border border-red-400 rounded py-8 px-4 mt-8">
        <p class="text-red-400 leading-7 [&:not(:first-child)]:mt-6">Remplir les champs dans vos réglages.</p>
      </div>';
    }

    return $result;
  }

} 