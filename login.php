<!DOCTYPE html>
<html>
	<head>
 	  <meta charset="UTF-8" />
  	  <meta name="viewport" content="width=device-width, initial-scale=1">
  	  <link rel="stylesheet" href="style.css">
  	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
<?php
   include("config.php");
   session_start();
   $error = "Entrez vos informations";

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id_con_uti FROM Utilisateurs WHERE id_con_uti = '$myusername' and mdp_uti = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;

         header("location: index.php");
      }else {
         $error = "Votre utilisateur ou votre mot de passe est incorrect";
      }
   }
?>
<html>

   <head>
      <title>Connexion</title>
   </head>
<?php
include("header.php");
?>
<div class="container login-container">
            <div class="row">
                <div class="col login-form-1">
                    <h3>Connexion au site</h3>
               <form action = "" method = "post">
                        <div class="form-group">
	                  <input type = "text" name = "username" class="form-control" placeholder="Votre identifiant"/>
			</div>
                        <div class="form-group">
	                  <input type = "password" name = "password" class="form-control" placeholder="Votre mot de passe"/>
			</div>
                        <div class="form-group">
		          		<input type = "submit" value = " Envoyer " class="btnSubmit"/>
			</div>
               </form>

			   <?php if($error) {
				   echo '<a style="color: red">'.$error;
					}
					?>
			   </div>
			   </div>

            </div>

         </div>

      </div>
<?php
include("footer.php");
?>
   </body>
</html>
