<?php

namespace App\model;

class GenerateFields
{
  public static function get(array $array):string
  {
    $string = "";
    foreach ($array as $value) {
      $string = $value .", ";
    }
    return substr(trim($string),0,-1);
  }

}