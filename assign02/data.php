<!--file data.php -->
<?php

	// sql info or use include 'file.inc'
       require_once('../../../conf/settings.php');

	// get name and password passed from client
		$name = $_GET['name'];
		$contact = $_GET['contact'];
		$unitno = $_GET['unitno'];
		$streetno = $_GET['streetno'];
		$streetname = $_GET['streetname'];
		$suburb = $_GET['suburb'];
		$destination = $_GET['destination'];
		$pickuptime = $_GET['pickuptime'];

		echo $name . "</br>";
		echo $contact . "</br>";
		echo $unitno . "</br>";
		echo $streetno . "</br>";
		echo $streetname . "</br>";
		echo $suburb . "</br>";
		echo $destination . "</br>";
		echo $pickuptime . "</br>";
	
/*	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
	);

	if (!$conn) {
	// Displays an error message
		echo "<p>Database connection failure</p>";
		}
		else
		{
			$sql = "CREATE TABLE cab (
			bookingNumber VARCHAR(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			customerName VARCHAR(100) NOT NULL,
			contactPhone INT(28) NOT NULL,
			unitNo VARCHAR(100) NOT NULL,
			streetNo VARCHAR(100) NOT NULL,
			streetName VARCHAR(100) NOT NULL,
			suburb VARCHAR(100) NOT NULL,
			destination VARCHAR(20) NOT NULL,
        	pickUpTime VARCHAR(20) NOT NULL,
			bookingDate VARCHAR(20) NOT NULL,
			status VARCHAR(20)
			)";

			$query = "select * from ajax where name = '$name' and password = '$pwd'";
			$queryUser = "select * from ajax where name = '$name'";
			$result = mysqli_query($conn, $query);
			$resultUser = mysqli_query($conn, $queryUser);
			$num_rows = $result->num_rows;
			$num_rowsUser = $resultUser->num_rows;

			// sleep for 10 seconds to slow server response down
			sleep(10);
			// write back the password concatenated to end of the name

			if($result == NULL) {
				echo "Username or Password Incorrect";
				echo "<br/>";
				echo "<td><a href='data.php'>Return to Homepage</a></td>";
			}
			if($num_rows>0) 
			{
				// Display the retrieved records
				echo "<table border=\"1\">";
				echo "<tr>\n"
					 ."<th scope=\"col\">Email</th>\n"
					 ."</tr>\n";

				while ($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>",$row["email"],"</td>";
				}
				echo "</table>";
			}
			else if($num_rowsUser>0)
			{
				echo "Password is Wrong";
			}
			else
			{
				echo "Username not found";
			}*/
?>
