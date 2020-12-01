<?php
$tml = $_POST['tml'];
$usn = $_POST['usn'];
$tm1 = $_POST['tm1'];
$usn1 = $_POST['usn1'];
$tm2 = $_POST['tm2'];
$usn2 = $_POST['usn2'];
$tm3 = $_POST['tm3'];
$usn3 = $_POST['usn3'];
$dm=$_POST['dm'];
$pn=$_POST['pn'];
$email=$_POST['email'];
$sec=$_POST['sec'];





if($tm2==!null && $usn2==null){
    echo "teammembers usn is compulsory";
}
   if($tm3==!null && $usn3==null){
    echo "teammembers usn is compulsory";
}
if (!empty($tml) || !empty($email) || !empty($sec) || !empty($pn)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "final";
    //connection to html
     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
  
      
    else{

          $UNI="SELECT usn From register where usn=? limit 1";
          $UNI1="SELECT usn1 From register where usn1=? limit 1";
          $UNI2="SELECT usn2 From register where usn2=? limit 1";
          $UNI3="SELECT usn3 From register where usn3=? limit 1";
          $EMAIL="SELECT email From register where email=? limit 1";
          $SELECT = "SELECT projectname From register Where projectname = ? Limit 1";
          $INSERT = "INSERT into register (teamlead, usn, teammember1, usn1, teammember2, usn2,teammember3, usn3,domain,projectname,section,email) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        
        
     //for team memeber2 usn 
        if($usn2==null){
            $rnum3=0;
        }
        else{
     $stmt3 = $conn->prepare($UNI2);
     $stmt3->bind_param("s", $usn2);
     $stmt3->execute();
     $stmt3->bind_result($usn2);
     $stmt3->store_result();
     $rnum3 = $stmt3->num_rows; 
        }
        
         //for team memeber2 usn 
        if($usn3==null){
            $rnum5=0;
        }
        else{
     $stmt5 = $conn->prepare($UNI2);
     $stmt5->bind_param("s", $usn2);
     $stmt5->execute();
     $stmt5->bind_result($usn2);
     $stmt5->store_result();
     $rnum5 = $stmt5->num_rows; 
        }
        
        
        // for team email 
     $stmt4 = $conn->prepare($EMAIL);
     $stmt4->bind_param("s", $email);
     $stmt4->execute();
     $stmt4->bind_result($email);
     $stmt4->store_result();
     $rnum4 = $stmt4->num_rows;
        
        
        
     if ($rnum==0 && $rnum1==0 && $rnum2==0 && $rnum3==0 && $rnum4==0 && $rnum5==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssssss", $tml, $usn, $tm1, $usn1, $tm2, $usn2, $tm3, $usn3, $dm, $pn, $sec, $email);
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