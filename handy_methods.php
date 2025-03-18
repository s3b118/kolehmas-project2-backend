<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

//XSS säkerhet
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Databas config
$servername = "localhost";
$dbname     = "kolehmas";
$username   = "kolehmas";
include "secret.php";

// Databas uppkoppling
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo("Connected to DB.");
