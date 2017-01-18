<?php
/* Set e-mail recipients */
$to = "vishwakarma.rhl@gmail.com";
$too = "ashu.dx@gmail.com";
$tooo = "yash.krishnakumar@gmail.com";
$email_to = $to . ", " . $too . ", " . $tooo;
error_log ("\\n Initializing mail to $email_to \\n", 3, 'rhl_log_file');

/* Do not Check all form inputs using check_input function */
$name = $_POST['name'];
$from = $_POST['email'];
$tel = $_POST['telp'];
$mobile = $_POST['mobile'];
$subject = "Mail from User: " . $name . ", Mobile: " . $mobile ;
//$usr_file = $_POST["usr_file"];


//VALIDATING AND UPLODAING FILE

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myFile"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["myFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
&& $fileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

$message = $_POST['comment'];

/* Let's prepare the message for the e-mail */
$mailmessage = "
    
    Dear Mesomeds Agent,
    
    A customer has reached out with an order.
    Please respond as soon as possible at the below mentioned contact.
    
    
    Name        : $name
    Phone       : $tel
    Mob/Wsapp   : $mobile
    Email       : $from
    Message     : $message

    
    #MESOMEDS.COM
    
    NOTE: Attachment functionality is not available. Please rely  on the Phone & email for now.
    
    ";
#error_log ("Format mail $mailmessage \\n", 3, 'rhl_log_file');
date_default_timezone_set('Asia/Kolkata');

/* Headers */
//$headers = "From: $myemail";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from.">\r\n" ;
$headers .= "Reply-To: <".$from.">" ;

error_log ("Send mail $mailmessage \\n", 3, 'rhl_log_file');
/* Send the message using mail() function */
if(mail($email_to, $subject, $mailmessage)){
    error_log ("Successfully sent mail to $email_to  \\n", 3, 'rhl_log_file');
}else{
    echo "<div> <h2>Sorry</h2> <p><h3>We are very sorry, there are some technical issues</h3></p> </div>";
    error_log ("Error in mail to $email_to  \\n", 3, 'rhl_log_file');
}

/* Redirect visitor to the thank you page */
header('Location: ../thanks.html');
exit();

?>