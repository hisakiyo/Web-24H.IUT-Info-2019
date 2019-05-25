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

if(!isset($_SESSION['login_user'])){
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myid = mysqli_real_escape_string($db,$_POST['id']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myentreprise = mysqli_real_escape_string($db,$_POST['Nom_Entreprise']);
      $myadresse = mysqli_real_escape_string($db,$_POST['Adresse']);
      $mycp = mysqli_real_escape_string($db,$_POST['Code_Postal']);
      $myville = mysqli_real_escape_string($db,$_POST['Ville']);
      $mypays = mysqli_real_escape_string($db,$_POST['Pays']);
      $mytel = mysqli_real_escape_string($db,$_POST['Telephone']);
      $mytype = mysqli_real_escape_string($db,$_POST['optradio']);

      $sql = "insert into Utilisateurs(id_con_uti,mdp_uti,lib_ent,adr_uti,tel_uti,typ_uti,cod_pos_uti,vil_uti,pays_uti) values('$myid','$mypassword','$myentreprise','$myadresse','$mytel','$mytype','$mycp','$myville','$mypays')";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         header("location: index.php");
      }else {

      }
}
       
echo '<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>S\'enregistrer</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="id">Identifiant d\'utilisateur</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="id" class="form-control" id="id"
                               placeholder="Thibault Branlant" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required>
                    </div>
                </div>
          </div>
        </div>

      <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="Nom_Entreprise">Nom d\'entreprise</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="Nom_Entreprise" class="form-control" id="Nom_Entreprise"
                               placeholder="Corporation xxx" required autofocus>
                    </div>
                </div>
            </div>
        </div>


      <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="Telephone">Telephone</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="Telephone" class="form-control" id="Telephone"
                               placeholder="0666666666" required autofocus>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="Adresse">Adresse</label>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                          <input type="text" name="Adresse" class="form-control" id="Adresse"
                                 placeholder="30 rue du Moulin" required autofocus>
                      </div>
                  </div>
              </div>

          </div>

          <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="Code_Postal">Code  Postal</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="number" name="Code_Postal" class="form-control" id="Code_Postal"
                                   placeholder="XXXXX" required autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="Ville">Ville</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                              <input type="text" name="Ville" class="form-control" id="Ville"
                                     placeholder="Dunkerque" required autofocus>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="Pays">Pays</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="text" name="Pays" class="form-control" id="Pays"
                                       placeholder="France" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                      <div class="col-md-3 field-label-responsive">
                          <label for="Type_uti">Type d\'utilisateur</label>
                      </div>
                      <div class="col-md-6">
                        <div class="form-check-inline">
                           <label class="form-check-label" for="radio1">
                             <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1" checked>Importateur
                           </label>
                        </div>
                       <div class="form-check-inline">
                         <label class="form-check-label" for="radio2">
                           <input type="radio" class="form-check-input" id="radio2" name="optradio" value="2">Exportateur
                         </label>
                       </div>

                      </div>
                  </div>



        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
            </div>
        </div>
    </form>
</div>';
} else {
               header("location: index.php");   
}

include("footer.php");

echo '</body></html>';

 

?>

