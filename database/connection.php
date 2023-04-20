<?php 
// Database connection

try{
    $db = new PDO("sqlite:db.db");
} 
catch (PDOException $pe) {
    die ("Could not connect to the database :" . $pe->getMessage());
}
