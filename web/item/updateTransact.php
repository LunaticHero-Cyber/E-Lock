<?php
    $passQR = $_COOKIE["passQR"];
    $IDPerson = 3;
    $IDLocker = 1;

    if(!empty($passQR)) {
        $host = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $dbUsername = "lv6du1sdw7esdgr1";
        $dbPassword = "l6ajcif9t46e079a";
        $dbName = "qcvmoqjfkun9tm3q";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if (mysqli_connect_error()) {
            echo 'Can not connect to SQL!';
            die('Connect Error('. mysqli_connect_errorno() .')'.  mysqli_connect_error());
        } else {
            $INSERT = "INSERT INTO Transaction_Person_Locker_Use(IDPerson, IDLocker, QRPassword) VALUES (?, ?, ?)";
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("iis",  $IDPerson, $IDLocker, $passQR);
            $stmt->execute();

            $UPDATE = "UPDATE Locker SET Status = 1, Locked= 0 WHERE IDLocker = ?";

            $stmt = $conn->prepare($UPDATE);
            $stmt->bind_param("i",  $IDLocker,);
            $stmt->execute();

            echo 'Successfully updated';
            $stmt->close();
            $conn->close();

            echo '<script>';
            echo '  window.location.href="https://e-lock.herokuapp.com/item/Home.php"';
            echo '</script>';
        }

    } else {
        echo "All fields are required!";
        die();
    }
?>