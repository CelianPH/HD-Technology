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

    <title>Ajout Utilisateur</title>
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
        <div class="container"> 
          <h3>Ajouter un utilisateur</h3>
            <a href="centre.php" class="btn btn-outline-primary btn_utilisateur"><- utilisateur</a>

          <form method="post" action="ajout.php">
            <div class="col-md-3 case3">
              <br><label for="nom" class="form-label case">Nom :</label>
              <input type="text" name="nom" id="nom" class="form-control" required>
            </div> 
            <div class="col-md-3 case2">
              <br><label for="prenom" class="form-label">Prenom :</label>
              <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="col-md-3 case4">
              <br><label for="mdp" class="form-label case">Mot de passe :</label>
              <input type="password" name="mdp" id="mdp" class="form-control" required>
            </div>
            <div class="col-md-3 case5">
              <br><label for="user" class="form-label">Nom d'utilisateur :</label>
              <input type="text" name="user" id="user" class="form-control" required>
            </div>

            <div class="col-md-4 case6">
              <br><br><select id="num_role" class="form-select" aria-label="Default select example" name="num_role">
                <option selected>--Séléctioner un rôle--</option>
                <?php

                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM role")->fetchAll();

                foreach ($data as $row) {
                  echo '<option value="'.$row["id_role"].'">' . $row["nom_role"] .'</option>';
                }
                ?>

              </select>
            </div>
            <div class="col-mb-5 position">
              <br><input type="submit" name="ajout" id="ajout" value="Ajouter" class="btn btn-primary">
            </div> 
          </div>
          <?php
          if (isset($_POST['ajout'])){
            $mdp = $_POST['mdp'];
            $username = $_POST['user'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom']; 
            $id_role = $_POST['num_role'];


            $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3'); 

            $stmt = $db->prepare("INSERT INTO utilisateur (username, mdp, nom, prenom, id_role) VALUES (:username, :mdp, :nom, :prenom, :num_role)");

            $stmt->bindParam(':username', $username); 
            $stmt->bindParam(':mdp',$mdp);
            $stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':prenom',$prenom);
            $stmt->bindParam(':num_role',$id_role);


            $stmt->execute();

            echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <strong> Tout est ok </strong> 
            <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></form>
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


