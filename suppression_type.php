<?php

    $db = new PDO('mysql:host=celiandcelian.mysql.db;dbname=celiandcelian;charset=utf8mb4','celiandcelian','Rocelina3');

$pdoStat = $db->prepare("DELETE FROM type WHERE id_type=:num LIMIT 1");


//liaison du paramètre num

$pdoStat->bindValue(':num', $_GET['id_type'], PDO::PARAM_INT);


//exécuter la requète

$executeIsOK = $pdoStat->execute();

if($executeIsOK){

    header("Location: ajout_type.php");
}else{
    echo 'Echec de la suppression';
}


?>