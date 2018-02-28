<?php
    include 'mysqlhelper.php';
    $conn = getConnection("soundche_parker","parker","soundche_TEST");

    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $first = $_POST["first"];
    $last = $_POST["last"];
    $deptid = $_POST["departmentID"];
    $sql = "INSERT INTO `soundche_TEST`.`Associate` (`ID`, `FirstName`, `LastName`, `DepartmentID`) VALUES (NULL, '".$first."', '".$last."', '".$deptid."');";
    
    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT ID, FirstName, LastName, DepartmentID FROM Associate where ID = ".mysqli_insert_id($conn);
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $return_arr = array();
            while($row = mysqli_fetch_assoc($result)) {
                $row_array['id'] = $row["ID"];
                $row_array['first'] = $row["FirstName"];
                $row_array['last'] = $row["LastName"];
                $row_array['departmentid'] = $row["DepartmentID"];
                echo json_encode($row_array);
            }
            
        } else {}
        mysqli_close($conn);
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        mysqli_close($conn);
        exit ;
    }
    
?>