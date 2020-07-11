<?php
namespace App\controller;
include("Queries/UserQueries.php");
use App\Queries\UserQueries;


class UserSession{
  public static function logout(){
    session_unset();
    session_destroy();
    header("location: ".BASE_URL."login");
  }

  private function verifyUser(){
    $userQueries = new UserQueries;
    $userInfo = $userQueries->getUser($_POST['username']);
    if ($userInfo){
      if (password_verify($_POST['password'], $userInfo['password'])) {
          return $key = true;
        }else{
          echo "Stop di skibi kaka";
      }
    } else {
      echo "Stop di skibi kaka";
    }
  }

  public function login(){
    $userQueries = new UserQueries;
    if (isset($_POST['username'])) {
      if ($this->verifyUser()) {
        $username = $_POST['username'];
        $token = bin2hex(openssl_random_pseudo_bytes(64));
				setcookie("YEFRI_ID", $token, time() +3600);
        $_SESSION["login"] = true;
        $userQueries->updateLogin($username, $token);
        header("Location: ".BASE_URL."home");

      };
    }
  }
  public function createUser(){
    $userQueries = new UserQueries;
    if (isset($_POST['username'])){
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $username = $_POST['username'];
    };
    if (isset($saved) && $saved) {
      header("Location: ".BASE_URL."login");
    }
  }
  public function verifyCookie(){
    $userQueries = new UserQueries;
    $userToken = $userQueries->getToken($_COOKIE['YEFRI_ID']);
    if ($userToken) {
      $_SESSION = true;
    }
  }
};
  