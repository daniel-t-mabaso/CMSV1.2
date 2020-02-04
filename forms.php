<?php @session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <?php
        include 'assets/php/dependencies.php';
        include 'assets/php/server.php'?>
</head>
<body class="background-colour book">
    <?php include 'assets/php/header.php'?>

<?php
    open_row('');
    echo"<div class='center-txt title secondary-txt'>Contact</div>";
    close_row();
    open_row('');
    

   // echo "Initialized<br>";
        $errors = array();
    if(isset($_POST['submit-form'])){
            $inputs = $_POST['form-input'];
            $to = $_POST['sendTo'];
            @$check =  $_POST['send'];
            
            if (empty($inputs[0])){
                array_push($errors, "Name is requred");
            }
            if (empty($inputs[1])){
                array_push($errors, "Email is required");
            }
            if (empty($inputs[2])){
                array_push($errors, "Subject is required");
            }
            if (empty($inputs[3])){
                array_push($errors, "Message is required");
            }
            if (!isset($check)){
                array_push($errors, "Please click \"I am a human\" to send messages");
            }

            if (count($errors)==0){
                $msg = "Subject: ".$inputs[2] . ".\n\nMessage: ".$inputs[3]."\n\nFrom:". $inputs[0] . "\n".$inputs[1];
                $subject = 'New message from website';
                $headers = "From: no-reply@goarmoured.com";
                mail($to, $subject, $msg, $headers);
                echo "<div class='heading center-txt success-txt'>Message successfully sent</div>";
                echo "<div class='subheading center-txt secondary-txt'>Thank you for getting in touch.<br>A member of our team will be in touch with you soon.</div>";
            }
            else{}
    }
    
    include 'error.php';

    close_row();
    open_row('');
    echo" ";
    close_row();
    open_row('');
    echo" ";
    close_row();
?>
<?php include 'assets/php/footer.php'?>
</body>
</html>