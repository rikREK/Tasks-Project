<?php

namespace App\helpers;
use \PDO;

class Database{
  protected $pdo;

  public function __construct(){
    try {
      $this->pdo = new PDO("mysql:host=localhost;dbname=yefri_su_opdracht", 'root', '',);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }  
  }
}
