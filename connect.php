<?php
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // database connection
    $conn = new mysqli('localhost','root','','testconnect');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, email, number, service, message)
        value(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $firstName, $email, $number, $service, $message);
        $stmt->execute();
        echo "Registration succesfully...";
        $stmt->close();
        $conn->close();

    }
?>
