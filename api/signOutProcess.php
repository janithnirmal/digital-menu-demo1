<?php

session_start(); //start  the session

if (isset($_SESSION["menudemo1admin"])) { //menudemo1admin session see the Isset
     
     unset($_SESSION["menudemo1admin"]); //unset the menudemo1admin session
     session_unset();  //our Admin session Unset
     session_destroy(); // and our session destroy
     echo("log out");//  if you log out success echo this one
     exit(); //ensure script execution stops here
}
