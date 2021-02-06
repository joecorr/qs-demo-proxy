<?php

	require_once("includes/ActiveCampaign.class.php");

	// Values inline for demo purposes only, these should be moved to config.php instead of in this file for best practices
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
	 * ADD OR EDIT CONTACT (TO THE NEW LIST CREATED ABOVE).
	 */

	// demo is unused, for reference or quick use only
	// here is the list ID to use for the demo: 4
	$hardcoded_list_id = 4;
	$passed_contact = array(
		"email"				=> $_POST['contactEmail'],
		"first_name"		=> $_POST['contactFirstName'],
		"last_name"			=> $_POST['contactLastName'],	// the following are active id requirements to place this contact in a list
		"p[{$hardcoded_list_id}]"      => $hardcoded_list_id,
		"status[{$hardcoded_list_id}]" => 1 // Make it "Active" status
	);
	$contact_sync = $ac->api("contact/sync", $passed_contact);









	if (!(int)$contact_sync->success) {
		// request failed
		echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
		exit();
	}
        
        // successful request
        $contact_id = (int)$contact_sync->subscriber_id;
        echo "<p>Contact synced successfully (ID {$contact_id})!</p>";

	/*
	 * VIEW ALL CONTACTS IN A LIST (RETURNS ID AND EMAIL).
	 */

	$ac->version(2);
	$contacts_view = $ac->api("contact/list?listid=14&limit=500");

	$ac->version(1);


?>