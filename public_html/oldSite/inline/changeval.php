<?php
    include 'mysqlhelper.php';
    $conn = getConnection("soundche_parker","parker","soundche_TEST");

    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $name = $_POST["name"];
    $pk = $_POST["pk"];
    $value = $_POST["value"];
    $sql = "UPDATE `soundche_TEST`.`Associate` SET `".$name."` = '".$value."' WHERE `Associate`.`ID` = ".$pk.";";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfullyy";
    } else {
        //echo "Error updating record: " . mysqli_error($conn);
        //header('HTTP/1.1 304 Not Modified') ;
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        exit ;
    }
?>