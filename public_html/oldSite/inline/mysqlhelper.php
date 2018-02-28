<?php
    function testReturnFunction($num1) {
            return $num1;
    }

    function getConnection($username, $password, $dbname){
        $servername = "localhost";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    //global variable used in all functions, set by setupConnection
    $connection = null;
    
    //required to use the other methods
    function setupConnection($username, $password, $dbname){
        $GLOBALS['connection'] = getConnection($username, $password, $dbname);
    }
    
    function closeConnection(){
        mysqli_close($GLOBALS['connection']);
    }
    
    function getFirstResult($sql){
        $result = mysqli_query($GLOBALS['connection'], $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }



    function insert($sql){  
        //example sql statement
        //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

        if (mysqli_query($GLOBALS['connection'], $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function delete($sql){
        //example sql statement
        //$sql = "DELETE FROM MyGuests WHERE id=3";

        if (mysqli_query($GLOBALS['connection'], $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteIdFromTable($id,$idColumnName, $table){
        $sql = "DELETE FROM ".$table." WHERE ".$idColumnName."=".$id;
        delete($sql);
    }
    
    function selectFromTableSpecial($fields, $d){
        
    }
?>