<?php

$fetch = "SELECT * FROM intervention where 1";

$pdo = new PDO("mysql:dbname=ilanr_;host=localhost","ilanr", "nV7X6KdGrCjhrw==");
$temp = $pdo->prepare($fetch);
$temp->execute();
$intervention = $temp->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['typeSearch'])) {
    $fetch .= " AND type_intervention LIKE :typeSearch";
    $temp = $pdo->prepare($fetch);
    $temp->bindValue(':typeSearch','%'.$_POST['typeSearch'].'%',PDO::PARAM_STR);
    $temp->execute();
    $intervention = $temp->fetchAll(PDO::FETCH_ASSOC);
};

if(isset($_GET['supprimer'])) {
        $temp = $pdo->prepare("DELETE FROM `intervention` WHERE `intervention`.`id_intervention` = :selected");
        $temp->bindValue(":selected", $_GET['supprimer'],PDO::PARAM_INT);
        $temp->execute();
        header('Location: ./');
}

if(isset($_POST['truc'])) {
        $temp = $pdo->prepare("UPDATE intervention SET type_intervention = :type, etage_intervention = :etage, date_intervention = :date where id_intervention = :selected");
        $temp->bindValue(":selected", $_POST['truc'],PDO::PARAM_INT);
        $temp->bindValue(":type", $_POST['type_intervention'],PDO::PARAM_STR);
        $temp->bindValue(":etage", $_POST['etage_intervention'],PDO::PARAM_INT);
        $temp->bindValue(":date", $_POST['date_intervention'],PDO::PARAM_STR);
        $temp->execute();
        header('Location: ./');
    }

if(isset($_POST["type"], $_POST["etage"], $_POST["date"])) {
        $type =  htmlspecialchars($_POST["type"]);
        $etage = htmlspecialchars($_POST["etage"]);
        $date = htmlspecialchars($_POST["date"]);
        $request = $pdo->prepare("INSERT INTO intervention (type_intervention, etage_intervention, date_intervention) VALUES (:type_intervention, :etage_intervention, :date_intervention)");
        $request->bindValue(":type_intervention",  $type ,PDO::PARAM_STR);
        $request->bindValue(":etage_intervention",  $etage ,PDO::PARAM_INT);
        $request->bindValue(":date_intervention",  $date ,PDO::PARAM_STR);
        $resultat= $request->execute(); $request->debugDumpParams(); 
        header('Location: ./'); 
    }

if(isset($_GET["reset"])) {
    $temp = $pdo->prepare("TRUNCATE TABLE intervention");
    $temp->execute();
    header('Location: ./');
}
    ?>