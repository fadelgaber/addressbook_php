<?php
   // Connect to database, and complain if it fails
   try {
      $dbhandle = new PDO('mysql:host=sql2.freemysqlhosting.net; dbname=sql2231015; port=3306',
                          'sql2231015', 'gD3%iE6!');
   }
   catch (PDOException $e) {
      // The PDO constructor throws an exception if it fails
      die('Error Connecting to Database: ' . $e->getMessage());
   }
   //SQL query is here
   $sql= "Insert Into people(name,phone,organisation,organisationid)
	 				Values('Test Person','05544111','TestOrg','7')
		  		";
	echo "Success";

	if ( $query->execute() === FALSE ) {
      die('Error Running Query: ' . implode($query->errorInfo(),' '));
	}
?>
