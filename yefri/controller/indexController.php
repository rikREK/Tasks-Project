<?php
namespace App\controller;
include("controller/UserSession.php");
use App\controller\UserSession;


class IndexController{
  public function login(){
    $userSession = new UserSession;
    $userSession->login(); 
    include("views/login.php");
  }

  public function createUser(){
    $userSession = new UserSession;
    $userSession->createUser();
    include("views/createUser.php");
  }

  public function logout(){
    $userSession = new UserSession;
    $userSession->logout();
  }
  
  public function verifyCookie(){
    $userSession = new UserSession;
    $userSession->verifyCookie();
  }
}
