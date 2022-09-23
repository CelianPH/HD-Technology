<?php

$db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

$pdoStat = $db->prepare("SELECT * FROM frais INNER JOIN type ON type.id_type= frais.id_type WHERE id_frais = :num");


//liaison du paramètre num

$pdoStat->bindValue(':num', $_GET['idfrais'], PDO::PARAM_INT);


//exécuter la requète

$executeIsOK = $pdoStat->execute();

$contact = $pdoStat->fetch();





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

    <title>Modifier Utilisateur</title>
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
          <h3>Modifier un frais</h3>
          <a href="mesfrais.php" class="btn btn-outline-primary btn_utilisateur"><- Mes Frais</a>
            <form method="post" action="modifierfrais.php">
              <center>
                <div class="col-md-1 case10">
                  <label for="idfrais" class="form-label white">ID frais:</label> 
                  <input type="text" class="form-control" id="idfrais" name="idfrais"  value="<?php echo $contact['id_frais'];?> " readonly>
                </div>
              </center>
              <div class="col-md-3 case3">
                <br><label for="nom2" class="form-label case">Nom :</label>
                <input type="text" name="nom2" id="nom2" class="form-control" value="<?php echo $contact['nom2'];?> "required>
              </div>
              <div class="col-md-3 case2">
                <br><label for="prenom2" class="form-label">Prenom :</label>
                <input type="text" name="prenom2" id="prenom2" class="form-control"value="<?php echo $contact['prenom2'];?> " required>
              </div>
              <div class="col-md-3 case4">
                <br><label for="montant" class="form-label case">Montant :</label>
                <input type="text" placeholder="€" name="montant" id="montant" class="form-control"value="<?php echo $contact['montant'];?> " required>
              </div>
              <div class="col-md-3 case5">
                <br><label for="piece_jointe" class="form-label">Pièce jointe :</label>
                <input type="file" name="piece_jointe" id="piece_jointe" class="form-control"value="<?php echo $contact['piece_jointe'];?> " required>
              </div>
              <div class="col-md-3 case6">
                <br><br><select id="type" class="form-select" aria-label="Default select example" name="type" value="<?php echo $contact['type'];?> ">
                  <option value="<?php echo $contact['id_type'];?> "><?php echo $contact['nom_type'];?></option>
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
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>