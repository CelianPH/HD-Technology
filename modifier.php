<?php

$db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');
$pdoStat = $db->prepare("UPDATE  utilisateur set username=:username, prenom=:prenom, mdp=:mdp, nom=:nom, id_role=:role WHERE id=:num LIMIT 1");

//liaison du paramètre num

$pdoStat->bindValue(':num', $_POST['iduser'], PDO::PARAM_STR);
$pdoStat->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
$pdoStat->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':role', $_POST['role'], PDO::PARAM_INT);




//exécuter la requète

$executeIsOK = $pdoStat->execute();

if($executeIsOK){

    header("Location: centre.php");
}else{
    echo 'Echec de la modification';
}


?>