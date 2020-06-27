<?php
namespace App\controller;

class HomeController{
  public function home(){
    if ($_SESSION["login"]) {
      include("views/privateHTML.php");
    }else{
      header("Location: ".BASE_URL."/login");
    }
 }
}