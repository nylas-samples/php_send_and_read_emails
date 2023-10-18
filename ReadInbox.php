<?php
# Import your dependencies
require_once('vendor/autoload.php');

# Load env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

# Headers with Authorization and type
$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Bearer ' . $_ENV['API_KEY_V3'];

$url = "https://api.us.nylas.com/v3/grants/" . $_ENV['GRANT_ID'] . "/messages?limit=1";
# Call the Read Email API
$ch = curl_init( $url );
#echo var_dump($ch);
#die();
# Submit the Headers
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headr);
# Return response instead of printing
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request
$result = curl_exec($ch);
echo var_dump($result);
#die();
# Close request
curl_close($ch);
# Print response.
echo "<pre>$result</pre>";
?>
