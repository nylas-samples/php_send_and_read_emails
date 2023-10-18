<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
# Import your dependencies
require_once('vendor/autoload.php');

# Load env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

# Initialize variables
$result = "";
# If we're working with a POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
# Required fields for Email API
$fields = array(
            'subject' => $_POST["subject"],
            'body' => $_POST["body"],
            'to' => array([
                 'name' => $_POST["to_name"],
                 'email' => $_POST["to_email"]
            ]),
        );	

# Headers with Authorization and type
$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Bearer ' . $_ENV['API_KEY_V3'];

$url = "https://api.us.nylas.com/v3/grants/" . $_ENV['GRANT_ID'] . "/messages/send";
# Call the Send Email API
$ch = curl_init( $url );
# Encode the data as JSON
$payload = json_encode( $fields );
# Submit the Email information
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
# Submit the Headers
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headr);
# We're doing a POST
curl_setopt($ch, CURLOPT_POST, true);
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
# Close request
curl_close($ch);
}
?>

<!-- Create the Form -->
	<h2>Send an Email using PHP and the Nylas APIs</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	To Name: <input type="text" name="to_name">
	<br><br>
	To Email: <input type="text" name="to_email">
	<br><br>	
	Subject: <input type="text" name="subject">
	<br><br>
	Body: <textarea name="body" rows="5" cols="40"></textarea>
	<br><br>
	<input type="submit" name="submit" value="Submit"> 
	</form>
	
<?php
	echo "$result";
?>	
	
</body>
</html>	
