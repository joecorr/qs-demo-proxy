<?php
	/* 
	 * This just creates a list to use, may be needed initially
	 */

	require_once("includes/ActiveCampaign.class.php");

	$ac = new ActiveCampaign("https://doublenines.api-us1.com", "f48dc664bd22b94cae71c56bcceb444ef5f8bff9f34d115f71ac37f7d1745ed6940e07a7");

	/*
	 * TEST API CREDENTIALS.
	 */

	if (!(int)$ac->credentials_test()) {
		echo "<p>Access denied: Invalid credentials (URL and/or API key).</p>";
		exit();
	}
	
        echo "<p>Credentials valid! Proceeding...</p>";
	
	/*
	 * VIEW ACCOUNT DETAILS.
	 */

	$account = $ac->api("account/view");

	echo "<pre>";
	print_r($account);
	echo "</pre>";

	/*
	 * ADD NEW LIST.
	 */

	$list = array(
		"name"           => "QS Demo List 1",
		"sender_name"    => "99s Demo",
		"sender_addr1"   => "123 Main Street",
		"sender_city"    => "Boulder",
		"sender_zip"     => "80301",
		"sender_country" => "USA",
	);

	$list_add = $ac->api("list/add", $list);

	if (!(int)$list_add->success) {
		// request failed
		echo "<p>Adding list failed. Error returned: " . $list_add->error . "</p>";
		exit();
	}
        
        // successful request
        $list_id = (int)$list_add->id;
        echo "<p>List added successfully (ID {$list_id})!</p>";


?>