<?php 
session_start();
//include("index.php")
if ( $_SESSION['role'] == 'Commercial') {
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

    <title>Ajout Frais</title>
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
              <a class="nav-link" href="frais_commercial.php"enctype="multipart/form-data">Frais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutfrais_commercial.php"enctype="multipart/form-data">Ajouter Frais</a>
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
          <h3>Ajouter un frais</h3>
            <a href="frais_commercial.php" class="btn btn-outline-primary btn_utilisateur"><- Frais</a>
          <form method="post" action="ajoutfrais_commercial.php">
            <div class="col-md-1">
              <select id="id" class="form-select" aria-label="Default select example" name="id" required>
                
                <?php


                $id =  $_SESSION['id_role'];
                $id1 = (int)$id;
                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM utilisateur WHERE id = '$id1'")->fetchAll();

                foreach ($data as $row) {
                echo "<option value=".$row['id'].">".$row['id']."</option>";
                }

                ?> 

              </select>
            </div>
            <div class="col-md-3 case3">
              <br><br><select id="nom" class="form-select" aria-label="Default select example" name="nom" required>
                
                <?php


                $id =  $_SESSION['id_role'];
                $id1 = (int)$id;
                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM utilisateur WHERE id = '$id1'")->fetchAll();

                foreach ($data as $row) {
                echo "<option value=".$row['nom'].">".$row['nom']."</option>";
                }

                ?> 

              </select>
            </div>
            <div class="col-md-3 case2">
              <br><br><select id="prenom" class="form-select" aria-label="Default select example" name="prenom" required>
                
                <?php


                $id =  $_SESSION['id_role'];
                $id1 = (int)$id;
                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM utilisateur WHERE id = '$id1'")->fetchAll();

                foreach ($data as $row) {
                echo "<option value=".$row['prenom'].">".$row['prenom']."</option>";
                }

                ?> 

              </select>
            </div>
            <div class="col-md-3 case4">
              <br><label for="montant" class="form-label case">Montant :</label>
              <input type="text" placeholder="€" name="montant" id="montant" class="form-control" required>
            </div>
            <div class="col-md-3 case5">
              <br><label for="piece_jointe" class="form-label">Pièce jointe :</label>
              <input type="file" name="piece_jointe" id="piece_jointe" class="form-control" required>
            </div>
            <div class="col-md-3 case7">
              <br><label for="date_ajout" class="form-label">Date :</label>
              <input type="date" name="date_ajout" id="date_ajout" class="form-control" required>
            </div>
            <div class="col-md-3 case8">
              <br><br><select id="num_type" class="form-select" aria-label="Default select example" name="num_type">
                <option selected>-- Séléctioner un type de frais --</option>
                <?php

                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM type")->fetchAll();

                foreach ($data as $row) {
                  echo "<option value=" . $row['id_type'] . ">" . $row['nom_type'] ."</option>";
                }
                ?>

              </select>
            </div>
            <div class="col-mb-5 position">
              <br><input type="submit" name="ajout2" id="ajout2" value="Ajouter" class="btn btn-primary">
            </div> 
          </div>
          <?php
          if (isset($_POST['ajout2'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $montant = $_POST['montant'];
            $piece_jointe = $_POST['piece_jointe'];
            $date_ajout = $_POST['date_ajout'];
            $id_type = $_POST['num_type'];


            $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

            $stmt = $db->prepare("INSERT INTO frais (id, nom2, prenom2, montant, piece_jointe, date_ajout, id_type, id_etat) VALUES (:id, :nom, :prenom, :montant, :piece_jointe, :date_ajout, :num_type, 1)");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom); 
            $stmt->bindParam(':prenom',$prenom);
            $stmt->bindParam(':montant',$montant);
            $stmt->bindParam(':piece_jointe',$piece_jointe);
            $stmt->bindParam(':date_ajout',$date_ajout);
            $stmt->bindParam(':num_type',$id_type);                        


            $stmt->execute();

            echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <strong> Tout est ok </strong> 
            <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></form>
      </div>
    </div>
    <div class="footer-basic">
      <footer>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="frais_commercial.php">Frais</a></li>
          <li class="list-inline-item"><a href="ajoutfrais_commercial.php">Ajout Frais</a></li>
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

