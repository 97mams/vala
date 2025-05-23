<?php

namespace App\controller;

/**
 * date time
 */
class DayController
{

  /**
   * convert timestampe to date string
   * @param string date forma("y-m-d")
   * @return string 
   */
  function formatedDate(string $date): string
  {
    $setdate = new \DateTime($date, new \DateTimeZone("Indian/Antananarivo"));
    return \IntlDateFormatter::formatObject(
      $setdate,
      "eeee d MMMM y",
      'fr'
    );

    }
  /**
   *day interval
   *@param string $date format("y-m-d")
   *@return int
   */
  function dayInterval (string $createdAt): int
  {
    $now = new \DateTimeImmutable(date("y-m-d", time()));
    // $now = new \DateTimeImmutable("2025-06-19");
    $createdAt = new \DateTimeImmutable($createdAt);
    return $createdAt->diff($now)->format('%a');
  }

}