<?php 
// Database connection

try{
    $db = new PDO("sqlite:../database/db.db");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} 
catch (PDOException $pe) {
    die ("Could not connect to the database :" . $pe->getMessage());
}
