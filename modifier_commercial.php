<?php

    $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

$pdoStat = $db->prepare("UPDATE  frais set nom2=:nom2, prenom2=:prenom2, montant=:montant, piece_jointe=:piece_jointe, id_type=:type WHERE id_frais=:num LIMIT 1");

//liaison du paramètre num

$pdoStat->bindValue(':num', $_POST['idfrais'], PDO::PARAM_STR);
$pdoStat->bindValue(':nom2', $_POST['nom2'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom2', $_POST['prenom2'], PDO::PARAM_STR);
$pdoStat->bindValue(':montant', $_POST['montant'], PDO::PARAM_STR);
$pdoStat->bindValue(':piece_jointe', $_POST['piece_jointe'], PDO::PARAM_STR);
$pdoStat->bindValue(':type', $_POST['type'], PDO::PARAM_INT);



//exécuter la requète

$executeIsOK = $pdoStat->execute();

if($executeIsOK){

    header("Location: frais_commercial.php");
}else{
    echo 'Echec de la modification';
}


?>