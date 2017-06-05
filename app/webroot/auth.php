<?php
session_start();
$myObj=new \stdClass();
$user=$_POST['usr'];
$passwd=$_POST['pwd'];
include "connection.php";
$sql="select * from os3_db_users where User_ID='$user' and Usr_Password='$passwd'";
$count=$conn->query($sql);

if ($count->num_rows > 0) {
	$_SESSION["uname"]="validUser";
	while($row = $count->fetch_assoc()) {
		 $_SESSION["userempno"]=$row["Usr_Emp_Number"];
		 $_SESSION["Usr_Emp_Name"]=$row["Usr_Emp_Name"];        
    }
	$myObj->statuscheck = "correct";
	$myObj->vlduser="valid";
	
}else {
	$myObj->statuscheck = "incorrect";
	$myObj->vlduser="notvalid";
	 
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>