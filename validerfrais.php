<?php

    $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

    $pdoStat = $db->prepare("UPDATE frais SET id_etat = '2' WHERE frais.id_frais = :num LIMIT 1");

//exécuter la requète
    $pdoStat->bindValue(':num', $_GET['idfrais'], PDO::PARAM_INT);


$executeIsOK = $pdoStat->execute();

if($executeIsOK){

    header("Location: frais.php");
}else{
    echo 'Echec de la validation';
}


?>
