<?php

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];


$email_form = 'chalindushanuka99@gmail.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name.\n".
                "User Email: $visitor_email.\n ". 
                    "User Message: $message.\n ";


    $to = "chalindushanuka1999@gmail.com";

    $headers = "From: $email_from \r \n";

    $headers .= "Reply-To: $visitor_email \r \n";

    mail($to , $email_subject , $email_body , $headers);
    header("Location:contactUs.html");


    //Database connection

    $conn = new mysqli('localhost' , 'room' , '' , 'contact');
    if($conn ->connect_error){
        die('connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into send(name , email , message)
        values(?,?,?)");

        $stmt->bind_param("sss",$name,$email,$message);
        $stmt->execute();
        echo "Send Successfully!";
        $stmt->close();
        $conn->close();

       }



?>