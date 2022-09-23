  <?php

  $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

  $pdoStat = $db->prepare("SELECT * FROM utilisateur INNER JOIN role ON role.id_role= utilisateur.id_role WHERE id = :num");


//liaison du paramètre num

  $pdoStat->bindValue(':num', $_GET['iduser'], PDO::PARAM_INT);


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
            <h3>Modifier un utilisateur</h3>
            <a href="centre.php" class="btn btn-outline-primary btn_utilisateur"><- utilisateur</a>
              <form method="POST" action="modifier.php">
                <center>
                  <div class="col-md-1 case10">
                    <label for="iduser" class="form-label white">ID :</label> 
                    <input type="text" class="form-control" id="iduser" name="iduser"  value="<?php echo $contact['id'];?> " readonly>
                  </div>
                </center>
                <div class="lourd">
                  <div class="col-md-3 case5">
                    <br><label for="username" class="form-label">Nom utilisateur :</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $contact['username'];?> ">
                  </div>

                  <br>
                  <div class="col-md-3 case4">
                    <br><label for="mdp"> Mots de passe :</label>
                    <input type="texte" class="form-control" name="mdp" id="mdp" value="<?php echo $contact['mdp'];?> " >
                  </div>
                  <div class="col-md-3 case3">
                    <br><label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $contact['nom'];?> ">
                  </div>
                  <br>
                  <div class="col-md-3 case2">
                    <br><label for="prenom" class="form-label">Prenom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $contact['prenom'];?> ">
                  </div>

                  <br>
                  <div class="col-md-3   case6">
                    <br><label for="role" class="pb-2">Rôle  :</label>
                    <select name="role" id="role" class="form-select" value="<?php echo $contact['role'];?> " >
                     <option value="<?php echo $contact['id_role'];?> "><?php echo $contact['nom_role'];?> </option>
                   </div>

                   <?php

                   $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                   $data = $db->query("SELECT * FROM role")->fetchAll();

                   foreach ($data as $row) {
                    echo "<option value=".$row['id_role'].">".$row['nom_role']."</option>";
                  }

                  ?>
                </select>
              </div>
            </div>

            <br>
            <center>
              <div class="col-mb-3 loginbox">
                <br><br><br><br><br><br><br><br><br><br><input type="submit" name="login" value="Modifier" class="btn btn-primary" >
              </div>
            </center><br><br>


          </form>
        </div>
      </div>

    </div>
  </div>  
</body>
</html>