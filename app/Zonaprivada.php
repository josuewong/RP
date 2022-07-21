<?php
include_once("app/UserSesion.php");
$uss=new UserSesion();
$loget=false;
      if (isset($_SESSION['usertag'])) {
      //  $loget=true;
      }else {
       // $loget=false;
        header("Location: index.php");
      }


?>
