
<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["name1"]==""||$_POST["email1"]==""||$_POST["comment"]==""){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['email1'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid  Email";
}
else{
	
	$to = $email = $_POST['email1'];
    $subject = 'your query sort out';
	

$msg = $_POST['comment'];
$body = <<<EMAIL
CONFIRMATION BOUCHER info@blueskyhotels.in


message: $msg.



EMAIL;

$header = 'From: info@blueskyhotels.in'. "\r\n".
'Reply-To: '.$to."\r\n" .	
'X-Mailer: PHP/' . phpversion();


mail($to, $subject, $body, $header);
echo "<script>alert('Boucher Send to the Customer')</script>";
}
}
}
?>

