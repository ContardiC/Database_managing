<?php
/**
 * Created by Carlo Contardi.
 * User: carlocontardi
 * Date: 03/04/18
 * Time: 11:59
 */
include 'db_connect.php';
$nome=$_POST['nome'];
$password=$_POST['password'];
$sql = "INSERT INTO users (nome,password)
VALUES ('$nome', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();