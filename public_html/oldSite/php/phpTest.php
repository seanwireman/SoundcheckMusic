<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">

    <title>myexamples</title>
    
    
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
    </style>
    
</head>
<body>

  <span id="mobilemenu" onclick="openNav()">&#9776; </span>
   
    <nav class="nav-main">
        
       <div class="nav-main">
<!--          <div class="logo" ><img height="35px" src="images/Altec_User_Logo.jpg" alt=""></div>-->
           <ul>
               <li>
                   <a href="#" class="nav-item">Amazing</a>
                   <div class="nav-content">
                       <div class="nav-sub">
                           <ul>
                               <li><a href="#">About</a></li>
                               <li><a href="#">Very long text in a menu bar</a></li>
                               <li><a href="#">Yes, I do</a></li>
                               
                           </ul>
                           
                       </div>
                   </div>
               
               </li>
               <li>
                   <a href="#" class="nav-item">CSS</a>
                       <div class="nav-content">
                           <div class="nav-sub">
                               <ul>
                                <li><a href="#">Yes, I do</a></li>
                              </ul>
                           </div>
                       </div>
                   
               </li>
               
              <li>
                 <a href="#" class="nav-item">Hello</a>
                       
                       <div class="nav-content">
                        <div class="nav-sub">
                               <ul>    
                                <li><a href="#">Is it me you're looking for?</a></li>
                               </ul>
                        </div>
                        
                      </div>
                  
              </li>
               
           </ul>
       </div>
        
    </nav>
    <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
    </div>
    
    
    
    <div id="main">
      
       
        <div class="flexcontainer">
            <!--<div style="order: -1;"><p>1</p></div>-->
            <?php
            $servername = "localhost";
            $username = "soundche_sean";
            $password = "bobomonkey";
            $dbname = "soundche_SampleData";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT `COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7` FROM `TABLE 1` WHERE 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                echo '<table>';
                echo '<tr><th>DATE</th><th>LOCATION</th><th>NAME</th><th>OBJECT</th><th>QTY</th><th>COST</th><th>TOTAL</th></tr>';
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    foreach($row as $value) {
                        echo '<td>'.$value.'</td>';
                    }
                    echo '</tr>';
                    
//                    echo "DATE: " . $row["COL 1"]. " - LOCATION: " . $row["COL 2"]. " - NAME:  " . $row["COL 3"]. " - OBJECT:  " 
//                        . $row["COL 4"]. " - QTY:  " . $row["COL 5"]. " - COST:  " . $row["COL 6"]. " - TOTAL:  " . $row["COL 7"]. "<br>";
                }
                echo '</table>';
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
          
            
        </div>
    </div>
    
<script>
function openNav() {
    if(document.getElementById("mySidenav").style.width == "250px"){
        closeNav();
    }else{
        //alert();
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0"; 
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
    

    
</script>



</body>
</html>