<?php 
// Database connection

try{
    $conn = new PDO("sqlite:".__DIR__."/db.sql");
} 
catch (PDOException $pe) {
    die ("Could not connect to the database :" . $pe->getMessage());
}
