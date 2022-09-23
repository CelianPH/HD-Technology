<?php 
session_start();
//include("index.php")
if ( $_SESSION['role'] == 'Manager') {
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

    <title>Ajout Type</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="image/HD" height="40" width="auto"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="centre.php">Utilisateur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="frais.php">Frais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajout_type.php">Ajout type</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajout_role.php">Ajout Rôle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mesfrais.php">Mes Frais</a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="btn btn-primary deco">Déconnexion</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row card2">
        <h3>Ajouter un rôle</h3>
        <form method="post" action="ajout_role.php">
          <div class="col-md-3 case9">
              <br><label for="nom" class="form-label case">Nom rôle :</label>
              <input type="text" name="nom_role" id="nom_role" class="form-control" required>
            </div> 
            <div class="col-mb-5 position1">
              <input type="submit" name="ajout4" id="ajout4" value="Ajouter" class="btn btn-primary ajout">
            </div>
            <?php
          if (isset($_POST['ajout4'])){
            $nom_role = $_POST['nom_role'];


            $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3'); 

            $stmt = $db->prepare("INSERT INTO role (nom_role) VALUES (:nom_role)");

            $stmt->bindParam(':nom_role', $nom_role); 


            $stmt->execute();

            echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <strong> Tout est ok </strong> 
            <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          ?>

          </form> 

          <br><br><br><br><br><div class="col-md-12">
            <table class="table table-striped table-hover" id="table_id">

              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">Rôle</th>
                  <th scope="col">Supprimer</th>

                </tr>
              </thead>
              <tbody>

                <?php

                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM role ")->fetchAll();

                foreach ($data as $row) {
                  echo "<tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>".$row['id_role']."</td>
                  <td>".$row['nom_role']."</td>
                  <td><a class='red' href='suppression_role.php?id_role=".$row['id_role']."'>Supprimer</a></td>
                  </tr>";  
                }


                ?>


              </tbody>
            </table>
          </div> 



      </div>
    </div>
    <div class="footer-basic">
      <footer>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="centre.php">Utilisateur</a></li>
          <li class="list-inline-item"><a href="frais.php">Frais</a></li>
          <li class="list-inline-item"><a href="ajout_type.php">Ajout Type</a></li>
          <li class="list-inline-item"><a href="ajout_role.php">Ajout Rôle</a></li>
          <li class="list-inline-item"><a href="mesfrais.php">Mes Frais</a></li>
          <li class="list-inline-item"><a href="index.php">Se Déconnecter</a></li>
        </ul>
        <p class="copyright">HD TECHNOLOGY © 1997</p>
      </footer>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
  </body>
  </html>
  <?php
  } else {
  header("Location:erreur.php");
}                     
?>