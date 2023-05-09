<?php
    $servername = "localhost";
    $username = "root";
    $password = "Chel@24sea99";
    $dbname = "projectdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $work_ID = $_POST["work_ID"];
    $resAddress = $_POST["resAddress"];

    $sql = "INSERT INTO Maintenance Workers (fname, lname, work_ID, resAddress) VALUES ('$fname', '$lname', '$work_ID', '$resAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
