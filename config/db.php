<?php 
	//Create Connection
	// To see password: 
	/*xammp/phpmyadmin/config.inc.php > under $cfg['Servers'][$i]['password']*/
	// To change password: watch video 2 traversy front to back minute 7:00
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	
	// Check connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to mySQL '. mysqli_connect_errno(); 
	}
?>