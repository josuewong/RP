<?php

    class UserSesion{

        public function __construct()
        {
            session_start();
        }

        public function setCurrentUser($user)
        {
            $_SESSION['usertag']=$user;
        }

        public function closeSesion()
        {
            session_destroy();
        }


    }


    

   // $uss=new UserSesion();
   // $uss->setCurrentUser("Agente secreto");

  //  session_start();
//    echo $_SESSION['usertag'];
 //$uss->closeSesion();
    /*
*/
?>