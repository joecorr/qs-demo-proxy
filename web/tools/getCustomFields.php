<?php 

// TODO: CHANGE API TOKEN FROM TEST / 99s ACTIVE CAMPAIGN ACCOUNT
// Get request to the Active Campaign API to retrieve the top 100 custom added fields to a contact
// Needed for testing only, Does not dynamically update the hardcoded list of variables passed to activecampaign

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Api-Token: f48dc664bd22b94cae71c56bcceb444ef5f8bff9f34d115f71ac37f7d1745ed6940e07a7'
));

curl_setopt($cURLConnection, CURLOPT_URL, 'https://doublenines.api-us1.com/api/3/fields?limit=100');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$customFieldList = curl_exec($cURLConnection);

$jsonArrayResponse = json_decode($customFieldList);

echo "<pre>";
print_r(($jsonArrayResponse));
echo "</pre>";

curl_close($cURLConnection);
?>
