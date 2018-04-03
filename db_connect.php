<?php
/**
 * Created by Carlo Contardi.
 * User: carlocontardi
 * Date: 03/04/18
 * Time: 10:44
 */

$DB_HOST="localhost";
$DB_USER="root";
$DB_PASS="root";
$DB_NAME="utenti";
$DB_PORT="3306";
/*
$db=mysql_connect($DB_HOST,$DB_USER,$DB_PASS)
    or die("Non riesco a creare la connessione");
mysql_select_db($DB_NAME)
    or die("Database non trovato");
/*/
// Create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS,$DB_NAME,$DB_PORT);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// TEST => echo "Connected successfully";
