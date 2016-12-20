<?php
  require_once('connection.php');
require_once('models/check.php');

$auth ='NONE';
    if (isset($_POST['password']) and isset($_POST['login'])){
    $user = Check::login($_POST['login']);
    $identifiant = $user[0]->identifiant;
    $passwords = $user[0]->password;
    $key = sha1(date('G s'));
    $crypted_password = sha1($_POST['password']);
 
    
      if( $passwords == $crypted_password){

          setcookie('login', $identifiant, time() + (365*24*3600), "/", null, false, true);
          setcookie('key', $key, time() + 900, "/", null, false, true);
          $save = Check::save($key, $cripted_password);
          $auth ="OK";
          }
        
  
    }



  $request  = $_SERVER['REQUEST_URI'];
  $params     = explode("/", $request);
  $temp = $params[1];

  if (count($params) == 2){ $params[1]= 'pages';  $params[2]= $temp;}


if (isset($_COOKIE['login']) && $_COOKIE['key']!="empty"){
  require_once('models/check.php');
  $result1 = Check::login($_COOKIE['login']);
  $verify = Check::verify($_COOKIE['key']);
    foreach ($result1 as $check) {
      $passwords = $check->password;
  }

  if ($passwords == $verify){
   $auth="OK";
  setcookie('key', $_COOKIE['key'] , time() + 900, "/", null, false, true);
  setcookie('category', $_COOKIE['category'], time() + 900, "/", null, false, true);
  }
}
elseif (isset($_COOKIE['login']) && !isset($_COOKIE['key'])) $auth="connect";
else { $auth="None";}

if ($params[2]=='logout'){
  require_once('models/check.php');
  $clean = Check::clean($_COOKIE['key']);
    setcookie('login',"empty", time() - 900);
      setcookie('key',"empty", time() - 900);
      $auth="NONE";
      } 

if (isset($params[1]) && isset($params[2]) && $params[2]!='') {
        $controller = $params[1];
        $action     = $params[2];
      } else {
        $controller = 'pages';
        $action     = 'home';
    }


  require_once('views/layout.php');



