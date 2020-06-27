<?php
session_start();
define('BASE_URL','http://localhost/yefri/');
include("controller/homeController.php");
require("controller/indexController.php");
use App\controller\HomeController;
use App\controller\IndexController;

if (isset($_COOKIES['YERFI_ID'])) {
  $indexController = new IndexController;
  $indexController->verifyCookie();
}
if(isset($_GET['route'])){
  $route = $_GET['route'];
}else{
  $route = 'login';
}
if ($route == 'login' && $_SESSION){

 $route = 'home';
}



switch ($route){
  case 'login':
    $indexController = new IndexController;
    $indexController->login();
  break;
  case 'user/create':
    $indexController = new IndexController;
    $indexController->createUser();
  break;
  case 'home':
    $homeController = new homeController;
    $homeController->home();
  break;
  case 'logout':
    $indexController = new IndexController;
    $indexController->logout();
    break;
  default:
   
    break;
}