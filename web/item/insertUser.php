<?php

$FulllName = $_POST['FullName'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];

if(!empty($FulllName) | !empty($email) | !empty($gender) | !empty($phone) | !empty($pass)) {
    $host = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbUsername = "lv6du1sdw7esdgr1";
    $dbPassword = "l6ajcif9t46e079a";
    $dbName = "qcvmoqjfkun9tm3q";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errorno() .')'.  mysqli_connect_error());
    } else {
        $SELECT = "SELECT Email from Person Where Email = ? Limit 1";
        $INSERT = "INSERT into Person(FullName, Email, Gender, Phone, Password) 
            values(?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0) {
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $FulllName, $email, $gender, $phone, $pass);
            $stmt->execute();
            echo "Successfully insert data";
        } else {
            echo "Someone already use this email";
        }

        $stmt->close();
        $conn->close();
    }

} else {
    echo "All fields are required!";
    die();
}

?>