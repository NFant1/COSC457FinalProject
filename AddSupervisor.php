<?php
    $servername = "jdbc:mysql://localhost:3306/projectdb?useSSL=false";
    $username = "root";
    $password = "Chel@24sea99";
    $dbname = "projectdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $superSSN = $_POST["superSSN"];
   
    $sql = "INSERT INTO Supervisor (fname, lname, superSSN) VALUES ('$fname', '$lname', '$superSSN')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>