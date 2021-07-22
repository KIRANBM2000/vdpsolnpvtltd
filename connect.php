<?php
    $name = $_POST['your name'];
    $email = $_POST['your email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //database connection
    $conn = new mysqli('localhost','root','','vdp');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(name,email,subject,message)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$name,$email,$subject,$message);
        $stmt->execute();
        echo "your message is sumbitted...";
        $stmt->close();
        $conn->close();
    }
?>
