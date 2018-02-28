<?php
    require_once 'db.class.php';
    DB::$user = 'soundche_parker';
    DB::$password = 'parker';
    DB::$dbName = 'soundche_TEST';

    $name = $_POST["name"];
    $pk = $_POST["pk"];
    $value = $_POST["value"];

    DB::query("UPDATE `soundche_TEST`.`Associate` SET `".$name."` = '".$value."' WHERE `Associate`.`ID` = ".$pk.";");
?>