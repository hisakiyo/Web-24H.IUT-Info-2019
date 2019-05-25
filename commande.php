 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Le café</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

<?php
include("header.php");
include("session.php");

if(!isset($_SESSION['login_user'])){
         header("location: index.php");
}
?>

<div class="row" style="width:1100px; margin: 0 auto;">
<!-- PREMIERE PARTIE -->  
<div class="col-md-6"><h2><center>Faire une commande</center></h2>


<?php

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myqt = mysqli_real_escape_string($db,$_POST['qt']);
      $mypays = mysqli_real_escape_string($db,$_POST['pays']);
      $mytype = mysqli_real_escape_string($db,$_POST['type']);


	if($mytype == "Arabica"){
		$type = 1;
	} else {
		$type = 2;
	}

	
      $sql = "select id_pay from Pays where lib_pay like '".$mypays."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $idpays = $row['id_pay'];



      $asql = "select max(num_com) from Commandes";
      $aresult = mysqli_query($db,$asql);
      $arow = mysqli_fetch_array($aresult,MYSQLI_ASSOC);
      $numcom = $arow['max(num_com)'] +1;



      $bdate = date("Y-m-d");
      $euser = $_SESSION['login_user'];
      $bsql = "insert into Commandes values('$type','$idpays','$myqt','$euser','$bdate','$numcom')";
      $bresult = mysqli_query($db,$bsql);
      $brow = mysqli_fetch_array($bresult,MYSQLI_ASSOC);
      $active = $brow['active'];


      /*$count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;

         header("location: index.php");
      }else {
         $error = "Votre utilisateur ou votre mot de passe est incorrect";
      }
*/
}
?>

<script>
  var calcul=0,calcul1=0,calcul2;
  function afficher_prix() {
    var select = document.getElementById("sel1") ;
    var choix= (select.selectedIndex)+1 ;
    calcul = 100*eval(choix) ;
    $("#Prix").html(calcul+"$") ;
    calcul2=calcul+calcul1;
    $("#PrixTotal").html(calcul2+"$") ;
  }
  function afficher_prix1() {
    var select1 = document.getElementById("sel2") ;
    var choix1 = (select1.selectedIndex)+1 ;
    calcul1 = 120*eval(choix1) ;
    $("#Prix1").html(calcul1+"$") ;
    calcul2=calcul+calcul1;
    $("#PrixTotal").html(calcul2+"$") ;
  }
</script>


<form action="" method="post">
      <div class="row">
          <div class="col-md-3 field-label-responsive">
          <div class="form-group">
    
    <label for="sel1">Quantité</label>
    <select class="form-control" id="sel1" name="qt" onchange="afficher_prix();">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>
  </div>
</div>
</div>



    <div class="form-group">
<label for="sel1">Type</label>
<select name="type" class="form-control" id="sell" name="pays">
  <option>Arabica</option>
  <option>Robusta</option>
</select>
</div>



    <div class="form-group">
<label for="sel1">Origine</label>
<select class="form-control" id="sell" name="pays">
  <option>Bresil</option>
  <option>Vietnam</option>
  <option>Indonésie</option>
  <option>Colombie</option>
  <option>Ethiopie</option>
  <option>Inde</option>
  <option>Honduras</option>
  <option>Pérou</option>
  <option>Mexique</option>
  <option>Gautemala</option>
</select>
</div>
      <label for="Prix">Prix</label>
          <p id="Prix">100$<p>
            <button class="btn btn-primary" type="submit">Valider</button>
</form>






























</div>
  <div class="col-md-4"><h2><center>Liste commandes</center></h2>
<!-- DEUXIEME PARTIE -->  
<br>
<?php
		$sql = "SELECT * from Commandes where nom_expo like '".$_SESSION['login_user']."'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		 echo '<div class="item">';

                        if($row['typ_caf'] == 1) {
                                echo "<h4>Type de café : Arabica</h4>";
                        } else {
                                echo "<h4>Type de café : Robusta</h4>";
                        }
                        $asql = "SELECT lib_pay from Pays where id_pay = ".$row['id_pay'];
                        $aresult = mysqli_query($db,$asql);
                        $arow = mysqli_fetch_array($aresult,MYSQLI_ASSOC);
                        echo '<h4> Pays : '.$arow['lib_pay'];
                        echo '<h4> Quantité commandé: '.$row['qte_com'] ."</h4>";
                        echo '<h4> Nom de l\'utilisateur: '.$row['nom_expo'] ."</h4>";
                        echo '<h4> Date de commande: '.$row['dat_com'] ."</h4>";
                        echo '<h4> Numéro de commande: '.$row['num_com'] ."</h4>";
                        echo '<button type="button" class="btn btn-warning">Modifier</button>';
                        echo '<button type="button" class="btn btn-danger">Annuler</button>';
                        echo '</div>';
                        echo '<br>';




		while (($row = $result->fetch_assoc()) !== null) {
			echo '<div class="item">';
			
			if($row['typ_caf'] == 1) {
			 	echo "<h4>Type de café : Arabica</h4>";
			} else {
				echo "<h4>Type de café : Robusta</h4>";
			}
		      	$asql = "SELECT lib_pay from Pays where id_pay = ".$row['id_pay'];
                	$aresult = mysqli_query($db,$asql);
                	$arow = mysqli_fetch_array($aresult,MYSQLI_ASSOC);
			echo '<h4> Pays : '.$arow['lib_pay']; 
                        echo '<h4> Quantité commandé: '.$row['qte_com'] ."</h4>";
                        echo '<h4> Nom de l\'utilisateur: '.$row['nom_expo'] ."</h4>";
                        echo '<h4> Date de commande: '.$row['dat_com'] ."</h4>";
                        echo '<h4> Numéro de commande: '.$row['num_com'] ."</h4>";
			echo '<button type="button" class="btn btn-warning">Modifier</button>';
			echo '<button type="button" class="btn btn-danger">Annuler</button>';
			echo '</div>';
			echo '<br>';
		}
?>





  </div>
</div>
</div>
<?php
include("footer.php");
?>
