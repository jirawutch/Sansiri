<?php
	$now = new DateTime();		
    	$token = $_POST['token'];
	$uuid = $_POST['uuid'];
	$email= $_POST['email'];

	echo "token : $token<br>" ;	
	echo "uuid : $uuid<br>" ;	
	echo "email : $email<br>" ;	
	echo $now->format('Y-m-d H:i:s');    // MySQL datetime format

	$link = mysqli_connect("localhost", "root", "Villa2018", "shoponline");
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$token = mysqli_real_escape_string($link, $token);
	$uuid = mysqli_real_escape_string($link, $uuid);

	/* this query with escaped $city will work */
	if (mysqli_query($link, "INSERT INTO partner_token(partner_name, token, ldate)	VALUES ('$uuid','$token',Now())")) {
		    printf("%d Row inserted.\n", mysqli_affected_rows($link));
	}

	   mysqli_close($link);


	    echo "New record created successfully";
	    header( "location: https://shoponline.villamarket.com/?___store=sansiri_th" );
	    exit(0);
?>
