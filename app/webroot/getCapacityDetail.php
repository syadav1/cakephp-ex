<html>
<?php
session_start();
$user_emp_no=$_SESSION["userempno"];
include connection.php;
$sql="select * from os3_db_utilization_hrs where User_Emp_Number='$user_emp_no'";
$result=$conn->query($sql);
?>
<div class="panel">Jun 2017</div>
		    	<table class="table table-striped">
					<tr>
					   <th>Date</th>
					   <th>Day Type</th>
						<th>Work Item</th>
						<th>Category</th>
						<th>Frequency</th>
						<th>Total Hrs</th>										
					</tr>
<?php
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
			echo "<tr><td>".date_format($row["utl_date"],"d-M-y")."</td><td>Workday</td><td>".$row["utl_Work_Item"]."</td><td>".$row["utl_Category"]."</td><td>".$row["utl_Frequency"]."</td><td>".$row["utl_utilized_hrs"]."</td></tr>";
				
		}
	}	
?>						    	
		    	</table>
<html>