<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select id_con_uti from Utilisateurs where id_con_uti = '$user_check' ");
   $right_sql = mysqli_query($db,"select typ_uti from Utilisateurs where id_con_uti = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $right = mysqli_fetch_array($right_sql,MYSQLI_ASSOC);
 
   $login_session = $row['id_con_uti'];
   $idroit = $right['typ_uti'];
   
//   if(!isset($_SESSION['login_user']))
//     header("location:login.php");
 //     die();
  // }
?>
