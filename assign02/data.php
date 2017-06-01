<!--file data.php -->
<?php

	// sql info or use include 'file.inc'
       require_once('../../../../conf/settings.php');

	// get name and password passed from client
		$name = $_GET['name'];
		$contact = $_GET['contact'];
		$unitno = $_GET['unitno'];
		$streetno = $_GET['streetno'];
		$streetname = $_GET['streetname'];
		$suburb = $_GET['suburb'];
		$destination = $_GET['destination'];
		$pickuptime = $_GET['pickuptime'];
	
	// The @ operator suppresses the display of any error messages
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
			if(mysqli_query($conn, 'select 1 from cab LIMIT 1') == false)
			{
			$sql = "CREATE TABLE cab (
			bookingNumber INT AUTO_INCREMENT PRIMARY KEY, 
			customerName VARCHAR(100) NOT NULL,
			contactPhone INT(28) NOT NULL,
			unitNo INT NOT NULL,
			streetNo INT NOT NULL,
			streetName VARCHAR(100) NOT NULL,
			suburb VARCHAR(100) NOT NULL,
			destination VARCHAR(100) NOT NULL,
        	pickUpTime VARCHAR(50) NOT NULL,
			status VARCHAR(20) NOT NULL
			)";
			echo "Table Created";
			}
			
			
				// Set up the SQL command to add the data into the table
				$query = "insert into cab"
								."(customerName, contactPhone, unitNo, streetNo, streetName, suburb, destination, pickUpTime, status)"
							. "values"
								."('$name','$contact','$unitno', '$streetno', '$streetname', '$suburb', '$destination', '$pickuptime', 'unassigned')";

			  /*echo $name . "</br>";
				echo $contact . "</br>";
				echo $unitno . "</br>";
				echo $streetno . "</br>";
				echo $streetname . "</br>";
				echo $suburb . "</br>";
				echo $destination . "</br>";
				echo $pickuptime . "</br>";*/

				// sleep for 10 seconds to slow server response down
				sleep(10);
						// executes the query
				$result = mysqli_query($conn, $query);
				// checks if the execution was successful
				if(!$result) {
					echo "<p>Something is wrong with ",	$query, "</p>";
				} else {
					// display an operation successful message
					echo "<p>Success</p>";

				$query = "select * from cab where customerName = '$name'";

				$result = mysqli_query($conn, $query);
				
				// checks if the execuion was successful
				if(!$result) {
					echo "<p>Something is wrong with ",	$query, "</p>";
				} else {

					while ($row = mysqli_fetch_assoc($result)){
						$refNumber = $row['bookingNumber'];
						$databaseTime = $row['pickUpTime'];
					}

					echo "</table>";
					echo "<br> Thank you! Your booking reference number is " . $refNumber;
					echo "<br> You will be picked up in front of your provided address at " . strftime('%H:%M', strtotime($databaseTime)) . " on " . strftime('%d/%m/%y', strtotime($databaseTime));

					// Frees up the memory, after using the result pointer
					mysqli_free_result($result);
				} // if successful query operation
				// close the database connection
				mysqli_close($conn);
			}
	}  // if successful database connection
?>