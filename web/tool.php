<?php 

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Api-Token: f48dc664bd22b94cae71c56bcceb444ef5f8bff9f34d115f71ac37f7d1745ed6940e07a7'
));

curl_setopt($cURLConnection, CURLOPT_URL, 'https://doublenines.api-us1.com/api/3/fields?limit=100');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$customFieldList = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse - json_decode($customFieldList);

echo "<pre>";
print_r(($jsonArrayResponse));
echo "</pre>";

?>