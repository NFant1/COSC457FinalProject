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
    $emp_ID = $_POST["emp_ID"];
    $mgr_ssn = $_POST["mgr_ssn"];
    $resAddress = $_POST["resAddress"];

    $sql = "INSERT INTO Residence Life Cordinator (fname, lname, emp_ID, mgr_ssn,resAddress) VALUES ('$fname', '$lname', '$emp_ID', '$mgr_ssn','$resAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
