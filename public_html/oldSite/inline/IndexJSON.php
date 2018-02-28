<?php
    include 'mysqlhelper.php';
    $conn = getConnection("soundche_parker","parker","soundche_TEST");

    $superobject = array();
    $sql = "SELECT ID, Name FROM Department";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $return_arr = array();
        while($row = mysqli_fetch_assoc($result)) {
            $row_array['id'] = $row["ID"];
            $row_array['name'] = $row["Name"];
            array_push($return_arr,$row_array);
        }
        $superobject["departmentArray"] = $return_arr;
    } else {}
    $sql = "SELECT ID, FirstName, LastName, DepartmentID FROM Associate";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $return_arr = array();
        while($row = mysqli_fetch_assoc($result)) {
            $row_array['id'] = $row["ID"];
            $row_array['first'] = $row["FirstName"];
            $row_array['last'] = $row["LastName"];
            $row_array['departmentid'] = $row["DepartmentID"];            array_push($return_arr,$row_array);
        }
        $superobject["associateArray"] = $return_arr;
    } else {}

    mysqli_close($conn);

    echo json_encode($superobject);
?>