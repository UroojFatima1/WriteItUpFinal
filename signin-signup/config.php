<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname="writeitup";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }
    /*$sql='CREATE DATABASE writeitup';
    if ($conn-> query($sql)===TRUE){echo "db created";}
    else{echo "Error creating db: ".$conn->error;}*/
    /*$sql = "CREATE TABLE users (
        username VARCHAR(20) PRIMARY KEY,
        pass VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        dob DATE NOT NULL,
        dp LONGLOB
        )";
        
        if ($conn->query($sql) === TRUE) {
          echo "Table created successfully";
        } else {
          echo "Error creating table: " . $conn->error;
        }
        
        $conn->close(); */

?>