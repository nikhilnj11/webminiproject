<!doctype html>
<html>
    <head>
        <style>
            *{
                background-color: aliceblue;
            }
            table{
                background-color: blueviolet;
                height: 400px;
                width:500px;
                overflow: scroll;
                font-size: 20px;
                table-layout: fixed;
                color: crimson;
            }
            th,td{
                padding: 10px;
                border: 1px solid;
            }
        </style>
        <title>
            names
        </title>
    </head>
<body>
    
    <table  align="center">
        <tr>
            <th>projectnames</th>    
        </tr>
<?php
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "cgv";
    //connection to database
     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else{
          $select="SELECT projectname FROM register";
          $result= $conn-> query($select);
          while($row=$result->fetch_assoc()){
              echo "<tr><td>".$row["projectname"]."</td></tr>";
          }
          echo "</table>";

      }
        $conn->close();
?>
</table>
</body>
</html>