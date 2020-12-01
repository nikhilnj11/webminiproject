<?php
$tml = $_POST['tml'];
$usn = $_POST['usn'];
$tm1 = $_POST['tm1'];
$usn1 = $_POST['usn1'];
$pn=$_POST['pn'];
$email=$_POST['email'];
$sec=$_POST['sec'];






if (!empty($tml) || !empty($email) || !empty($sec) || !empty($pn)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dbms";

    //connection to html
     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
  
      
    else{

          $UNI="SELECT usn From register where usn=? limit 1";
          $UNI1="SELECT usn1 From register where usn1=? limit 1";
          $EMAIL="SELECT email From register where email=? limit 1";
          $SELECT = "SELECT projectname From register Where projectname = ? Limit 1";
          $INSERT = "INSERT into register (teamlead, usn, teammember1, usn1, projectname,section,email) values(?, ?, ?, ?, ?, ?, ?)";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $pn);
     $stmt->execute();
     $stmt->bind_result($pn);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
        // for teamlead usn
        $stmt1 = $conn->prepare($UNI);
     $stmt1->bind_param("s", $usn);
     $stmt1->execute();
     $stmt1->bind_result($usn);
     $stmt1->store_result();
     $rnum1 = $stmt1->num_rows;
        
    // for team memeber1 usn 
     $stmt2 = $conn->prepare($UNI1);
     $stmt2->bind_param("s", $usn1);
     $stmt2->execute();
     $stmt2->bind_result($usn1);
     $stmt2->store_result();
     $rnum2 = $stmt2->num_rows;
        
        
        
        // for team email 
     $stmt4 = $conn->prepare($EMAIL);
     $stmt4->bind_param("s", $email);
     $stmt4->execute();
     $stmt4->bind_result($email);
     $stmt4->store_result();
     $rnum4 = $stmt4->num_rows;
        
        
        
     if ($rnum==0 && $rnum1==0 && $rnum2==0 && $rnum4==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssss", $tml, $usn, $tm1, $usn1,$pn, $sec, $email);
      $stmt->execute();
       echo '<script type="text/javascript">

            alert("Succesfully inserted"); 

</script>';
         

     }else{
        echo '<script type="text/javascript">

          window.onload = function () { alert("Someone has the same credentials please recheck"); }

</script>';
         

    }
}
}




?>