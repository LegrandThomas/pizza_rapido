<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      echo '<h3>Succes, Bienvenue - '.$_SESSION["username"].'</h3>';  
      echo '<br /><br /><a href="./logout.php">Logout</a>';  
      if ($_SESSION["username"]=="admin"){
      echo '<br /><br /><a href="Admin_dashboard.php">Dashboard admin</a>';  
    }else
    echo '<br /><br /><a href="./commande.php">Commander</a>'; 
 }  
 else  
 {  
      header("location:pdo_login.php");  
 }  
 ?>  