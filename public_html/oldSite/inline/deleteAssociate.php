<?php
    include 'mysqlhelper.php';
    $conn = getConnection("soundche_parker","parker","soundche_TEST");

    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $pk = $_POST["pk"];
    $sql = "DELETE FROM Associate WHERE id=".$pk;
    
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfullyy";
        mysqli_close($conn);
    } else 
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);{
        echo "Could not delete";
        mysqli_close($conn);
        exit ;
    }
?>