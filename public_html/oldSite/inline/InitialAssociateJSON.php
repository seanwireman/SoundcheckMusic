<?php
    require_once 'db.class.php';
    DB::$user = 'soundche_parker';
    DB::$password = 'parker';
    DB::$dbName = 'soundche_TEST';

    $associates = DB::query("SELECT ID, FirstName, LastName, DepartmentID FROM Associate");
    $departments = DB::query("SELECT ID, Name FROM Department");
    $jsonobject["AssociateArray"] = $associates;
    $jsonobject["DepartmentArray"] = $departments;

    echo json_encode($jsonobject);
?>