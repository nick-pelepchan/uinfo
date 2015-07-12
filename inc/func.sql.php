<?php

/////////////////////////////////////////////////////////////////
// SQL
//
	function sql_conn($query){
		require(dirname(getcwd()).'/dcon.php');
		$dbConn = new mysqli($servername, $dbuser, $dbpass, $dbname);
		unset ($servername, $dbuser, $dbpass, $dbname);

		if($dbConn->connect_error){
			trigger_error('Unable to connect to database [' . $dbConn->connect_error, E_USER_ERROR . ']');
		}

		$result = mysqli_query($dbConn, $query);
		
		mysqli_close($dbConn);
		unset($dbConn);
		
			/*if(mysqli_query($dbConn, $query)) {
				echo "Successful";
			} else {
				echo "\nError".mysqli_error($dbConn);
			};*/
			return($result);
	}
//
//
/////////////////////////////////////////////////////////////////

?>