<?php 
session_start();



// if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="projet2.css">

    <title>Connexion</title>
  </head>
  <body>
    <img src="image/HD" height="105" width="auto" class="">
    <div class="container">
      <div class="row">
        <div class="card12">
          <div class="content">
            <form method="post" action="index.php">
              <h1>Connexion</h1>
              <div class="col-mb-3">
                <br><label for="user" class="form-label case">Nom d'utilisateur :</label><br>
                <input type="text" name="user" id="user" class="form-control">
              </div>
              <div class="col-mb-3">
                <br>  <label for="mdp" class="form-label">Mot de passe :</label><br>
                <input type="password" name="mdp" id="mdp" class="form-control">
              </div>
              <div class="col-mb-3">
                <br><br><input type="submit" name="login" value="Se Connecter" class="btn btn-primary">
              </div> 


            </div>
            <?php

                        // try {
                        //     $db = new PDO('mysql:host=localhost;dbname=insertbdd;charset=utf8mb4', 'root', '');
                        // }
                        // catch(Exception $e){
                        //     die ('Erreur :'. $e->getMessage());
                        // } 
            
            if(isset($_POST['user']) && isset($_POST['mdp'])) {
              $success = 0;

              $user = isset($_POST['user']) ? $_POST['user'] : NULL;
              $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
              $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
              $data = $db->query(" SELECT * FROM utilisateur INNER JOIN role  ON role.id_role= utilisateur.id_role")->fetchALL();

              foreach ($data as $row) {
                if ($row['username'] == $user) {
                  if ($row['mdp'] == $mdp){
                    $success = 1;
                    $redir = $row["id_role"];
                    
                    $_SESSION['username'] = $user;
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['role'] = $row['nom_role'];
                    $_SESSION['id_role'] = $row['id'];
                    break;
                  }else{
                    $success = 2;
                  }
                }else{
                  $success = 2;

                }
              }
              if ($success == 1 && $_SESSION['role'] == 'Manager')  {
                header("Location:centre.php");
                exit();
              } elseif ($success == 2 && $success != 0) {
 
               header("location:erreurlogin.php");

              } elseif  ($success == 1 && $_SESSION['role'] == 'Comptable') {
                header("Location:frais_comptable.php");
                exit();
              } elseif  ($success == 1 && $_SESSION['role'] == 'Commercial') {
                header("Location:frais_commercial.php");
                exit();
              }
            }



          //     if ($success) {
          //      if($redir==1){
          //       header('Location: centre.php?com_id='.$com_id);
          //       exit();
          //     }
          //     elseif($redir==2) {
          //       header('Location: frais_commercial.php?com_id='.$com_id);
          //       exit();
          //     }
          //     elseif($redir==3) {
          //       header('Location: frais_comptable.php');
          //       exit();
          //     }

          //     else {
          //       echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
          //       <strong>echec de connexion</strong>
          //       <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          //       </div>';
          //       exit();
          //     }
              
          //   } 

          // }
          ?>
        </div>
      </div> 


    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>
<?php


  ?>