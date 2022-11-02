<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "college_feedback_system";
  // $dbhost = "116.206.104.235";
  // $dbuser = "technvxg_pv";
  // $dbpass = "pvtest@4567";
  // $db = "technvxg_pratikriya_vishleshan";
 


 $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn->error);
//  if($conn)
//  {
//   // echo "Succesful";
//  }
//  else
//   echo "FaIL";
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn->close();
 }
   
?>
