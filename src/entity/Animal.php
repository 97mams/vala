<?php

namespace App\entity;

use DateTime;

class Animal
{

  private ?string $name;
  private ?string $genre;
  private ?string $type;
  private ?string $sexe;
  private ?int $age;

  public function getName():string
  {
    return $this->name;
  }

  public function setName(string $name):void
  {
    $this->name = $name;
  }

  public function getGenre():string
  {
    return $this->genre;
  }

  public function setGenre(string $genre): void
  {
    $this->genre = $genre;
  }

  public function getType():string
  {
    return $this->type;
  }

  public function setType(string $type):void
  {
    $this->type = $type;
  }

  public function getSexe():string
  {
    return $this->sexe;
  }

  public function setSexe(string $sexe):void
  {
    $this->sexe = $sexe;
  }

  public function getAge():int
  {
    return $this->age;
  }

  public function setAge(int $age):void
  {
    $this->age = $age;
  }

}