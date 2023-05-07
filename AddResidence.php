<?php
    $servername = "jdbc:mysql://localhost:3306/projectdb?useSSL=false";
    $username = "root";
    $password = "Chel@24sea99";
    $dbname = "projectdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Residence_name = $_POST["Residence_name"];
    $room_num = $_POST["room_num"];
    $bed_space = $_POST["bed_space"];
    $floor = $_POST["floor"];
    $key_num = $_POST["key_num"];

    $sql = "INSERT INTO Residence (Residence_name, room_num, bed_space, floor, key_num)
    
     VALUES ('$Residence_name', '$room_num', '$bed_space', '$floor', '$key_num')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
