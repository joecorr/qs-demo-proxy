<?php 
	/* 
	 * Other potentially needed AC methods: message, campaign, report
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
	 * ADD NEW EMAIL MESSAGE (FOR A CAMPAIGN).
	 */

	$message = array(
		"format"        => "mime",
		"subject"       => "Check out our latest deals!",
		"fromemail"     => "newsletter@test.com",
		"fromname"      => "Test from API",
		"html"          => "<p>My email newsletter.</p>",
		"p[{$list_id}]" => $list_id,
	);

	$message_add = $ac->api("message/add", $message);

	if (!(int)$message_add->success) {
		// request failed
		echo "<p>Adding email message failed. Error returned: " . $message_add->error . "</p>";
		exit();
	}
        
        // successful request
        $message_id = (int)$message_add->id;
        echo "<p>Message added successfully (ID {$message_id})!</p>";

	/*
	 * CREATE NEW CAMPAIGN (USING THE EMAIL MESSAGE CREATED ABOVE).
	 */

	$campaign = array(
		"type"             => "single",
		"name"             => "July Campaign", // internal name (message subject above is what contacts see)
		"sdate"            => "2013-07-01 00:00:00",
		"status"           => 1,
		"public"           => 1,
		"tracklinks"       => "all",
		"trackreads"       => 1,
		"htmlunsub"        => 1,
		"p[{$list_id}]"    => $list_id,
		"m[{$message_id}]" => 100, // 100 percent of subscribers
	);

	$campaign_create = $ac->api("campaign/create", $campaign);

	if (!(int)$campaign_create->success) {
		// request failed
		echo "<p>Creating campaign failed. Error returned: " . $campaign_create->error . "</p>";
		exit();
	}
        
        // successful request
        $campaign_id = (int)$campaign_create->id;
        echo "<p>Campaign created and sent! (ID {$campaign_id})!</p>";

	/*
	 * VIEW CAMPAIGN REPORTS (FOR THE CAMPAIGN CREATED ABOVE).
	 */

	$campaign_report_totals = $ac->api("campaign/report/totals?campaignid={$campaign_id}");

	echo "<p>Reports:</p>";
	echo "<pre>";
	print_r($campaign_report_totals);
	echo "</pre>";

?>