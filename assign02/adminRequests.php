<!--file data.php -->
<?php

	// sql info or use include 'file.inc'
       require_once('../../../../conf/settings.php');
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
	);

	date_default_timezone_set('Pacific/Auckland');
	$date = date('Y-m-d\TH:i', time()+7200);
	echo $date;

	if (!$conn) {
	// Displays an error message
		echo "<p>Database connection failure</p>";
		}
		else
		{
				$query = "select * from cab where status = 'unassigned'";

				$result = mysqli_query($conn, $query);
				
				// checks if the execuion was successful
				if(!$result) {
					echo "<p>Something is wrong with ",	$query, "</p>";
				} else {
			// Display the retrieved records
			echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Booking Number</th>\n"
			     ."<th scope=\"col\">Customer Name</th>\n"
				 ."<th scope=\"col\">Contact Phone</th>\n"
				 ."<th scope=\"col\">Unit Number</th>\n"
				 ."<th scope=\"col\">Street Number</th>\n"
				 ."<th scope=\"col\">Street Name</th>\n"
				 ."<th scope=\"col\">Suburb</th>\n"
                 ."<th scope=\"col\">Destination</th>\n"
                 ."<th scope=\"col\">Pick Up Time</th>\n"
                 ."<th scope=\"col\">Status</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			// Note the = is used to assign the record value to variable $row, this is not an error
			// the ($row = mysqli_fetch_assoc($result)) operation results to false if no record was retrieved
			// _assoc is used instead of _row, so field name can be used
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>",$row["bookingNumber"],"</td>";
				echo "<td>",$row["customerName"],"</td>";
				echo "<td>",$row["contactPhone"],"</td>";
				echo "<td>",$row["unitNo"],"</td>";
				echo "<td>",$row["streetNo"],"</td>";
				echo "<td>",$row["streetName"],"</td>";
				echo "<td>",$row["suburb"],"</td>";
                echo "<td>",$row["destination"],"</td>";
                echo "<td>",$row["pickUpTime"],"</td>";
                echo "<td>",$row["status"],"</td>";
				echo "</tr>";
			}
			echo "</table>";

            echo "<a href='admin.htm'>Return to Admin Page</a>";
					// Frees up the memory, after using the result pointer
					mysqli_free_result($result);
				} // if successful query operation
				// close the database connection
				mysqli_close($conn);
			}
	  // if successful database connection
?>