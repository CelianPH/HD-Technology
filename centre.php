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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="projet2.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

    <script defer src="index.js"></script>
    <title>Utilisateur</title>
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
              <a class="nav-link" href="ajout_type.php">Ajout Type</a>
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
      <div class="row card1">
        <div class="container">
          <div class="col-mb-3">
            <br><h2>Utilisateur</h2>
          </div>
          <form method="post" action="ajout.php"> 
            <div class="col-mb-3">
              <input type="submit" name="bouton" value="Ajouter" class="btn btn-outline-primary btn_ajout"><hr>
            </div>
          </form>
          <div class="col-md-12">
            <table class="table table-striped table-hover " id="table_id" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Username</th>
                  <th scope="col">password</th>
                  <th scope="col">Rôle</th>
                  <th scope="col">Supprimer</th>
                  <th scope="col">Modifier</th>
                </tr>
              </thead>
              <tbody>

                <?php



                $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
                $data = $db->query("SELECT * FROM utilisateur INNER JOIN role ON role.id_role = utilisateur.id_role")->fetchAll() ;



                foreach ($data as $row) {
                  echo "<tr><td>".$row['id']."</td>
                  <td>".$row['nom']."</td>
                  <td>".$row['prenom']."</td>
                  <td>".$row['username']."</td>
                  <td>".$row['mdp']."</td>
                  <td>".$row['nom_role']."</td>
                  <td><a class='yellow' href='modification.php?iduser=".$row['id']."'>Modifier</a></td>
                  <td><a class='red' href='suppression.php?id=".$row['id']."'>Supprimer</a></td>

                  </tr>";  
                }

                


                ?>


              </tbody>
            </table>
          </div> 
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#table_id').DataTable();
      } );
    </script>


  </body>
  </html>
<?php
  } else {
  header("Location:erreur.php");
}                     
?>