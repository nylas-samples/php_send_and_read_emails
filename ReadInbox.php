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
$headr[] = 'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN'];

# Call the Read Email API
$ch = curl_init( "https://api.nylas.com/messages?in=inbox&unread=true&limit=1" );
# Submit the Headers
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headr);
# Return response instead of printing
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request
$result = curl_exec($ch);
# Close request
curl_close($ch);
# Print response.
echo "<pre>$result</pre>";
?>
