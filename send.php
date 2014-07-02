<?php
error_reporting(-1);
ini_set('display_errors', 'On');
if(isset($_POST['services'])) {

// EDIT THE 2 LINES BELOW AS REQUIRED
$email_to = "davidzold@gmail.com";
$email_subject = "Mobile Orders";
$email_from = $_REQUEST['name']. "" .$_REQUEST['lastname'];

$email_message = "Order details below.\n\n";

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}

$email_message .= "First Name: ".clean_string($_POST["name"])."\n";
$email_message .= " Last Name: ".clean_string($_POST["lastname"])."\n";
$email_message .= "Date: ".clean_string($_POST["date"])."\n";
$email_message .= "Ingredients: ".implode(" ", $_POST['services'])."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers); 
?>

<!-- include your own success html here -->
<center>

  Thank you for your order.<br>
<br>
 <a href="index.html">HOME</a></center>

<?php
}
?>