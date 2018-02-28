<?php
    include 'TableObject.php';
    $conn = getConnection("prdiard_admin","parkerdoesphp","prdiard_games");
    $table = new TableObject;
    $table->setConnection($conn);
    $table->setTableAndColumnsAndID("simpletable", "id,information", "id");
    $info = $table->getResultFromID(2);
    echo $info['information'];
    $result = $table->getArrayOfAllResults("Order by information");
    foreach ($result as $value){
        echo $value['id'].'   '.$value['information'] ."<br />";
    }
    echo "<br />";
    echo "<br />";
    $scoreTable = new TableObject;
    $scoreTable->setConnection($conn);
    $scoreTable->setTableAndColumnsAndID("highscores", "id,username,highscore,attempts,average", "id");
    $scoreTable->echoTable("order by id desc");
    
    //$result = $scoreTable->getArrayOfAllResults("Order by highscore");
//    foreach ($result as $value){
//        echo $value['id'].'   '.$value['information'] ."<br />";
//    }
?>