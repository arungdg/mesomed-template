<html>

<body>
  <?php
$tel = $_POST["tel"];
$mobile = $_POST["mobile"];
$name = $_POST["name"];
$msg = $_POST["message"];
$email = $_POST["email"];
$usr_file = $_POST["usr_file"];
$subject = "Mail from" . $name ;
$to = "arun.gadag@awnics.com";
$message = <<<EMAIL

Customer details are as follows:

Name: $name
Primary tel no.: $tel
Secondary tel no.: $mobile
Email ID: $email
Uploaded file: $usr_file

Message from the customer: $msg

EMAIL;

$headers = "From: arun.gdg@gmail.com";

date_default_timezone_set('Asia/Kolkata');

$mail = mail($to,$subject,$message,$headers);

if($mail==true) {
    echo "Mail sent successfully";
}
else {
    echo "<br/>Mail could not be sent";
}
?>
</body>

</html>