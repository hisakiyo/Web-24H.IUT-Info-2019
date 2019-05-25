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


		$sql = "SELECT * from Pays";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                 echo '<div class="item">';
     			echo '<h4> Id Pays : '.$row['id_pay'];
                        echo '<h4> Nom Pays: '.$row['lib_pay'] ."</h4>";
                        echo '<h3> Description pays: '.$row['des_pay'] ."</h3>";
                        echo '<h4> Capital: '.$row['cap_pay'] ."</h4>";
                        echo '<h4> drapeau pays: '.$row['dra_pay'] ."</h4>";
                        echo '<h4> habitants: '.$row['hab_pay'] ."</h4>";
                        echo '<h4> surface du pays: '.$row['sur_pay'] ."</h4>";
                        echo '<button type="button" class="btn btn-warning">Modifier</button>';
                        echo '<button type="button" class="btn btn-danger">Annuler</button>';
                        echo '</div>';
                        echo '<br>';
                        echo '</div>';
                        echo '<br>';


                while (($row = $result->fetch_assoc()) !== null) {
                        echo '<div class="item">';

 			echo '<h4> Id Pays : '.$row['id_pay']."</h4>";
                        echo '<h4> Nom Pays: '.$row['lib_pay'] ."</h4>";
                        echo '<h3> Description pays: '.$row['des_pay'] ."</h3>";
                        echo '<h4> Capital: '.$row['cap_pay'] ."</h4>";
                        echo '<h4> drapeau pays: <img src=\"'.$row['dra_pay'] ."/></h4>";
                        echo '<h4> habitants: '.$row['hab_pay'] ."</h4>";
                        echo '<h4> surface du pays: '.$row['sur_pay'] ."</h4>";
                        echo '<button type="button" class="btn btn-warning">Modifier</button>';
                        echo '<button type="button" class="btn btn-danger">Annuler</button>';
                        echo '</div>';
                        echo '<br>';
 
                        echo '</div>';
                        echo '<br>';
                }






?>





<?php
include("footer.php");
?>

</body>
</html>
