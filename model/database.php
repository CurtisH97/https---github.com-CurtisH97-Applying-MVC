<?php
    $dsn ="mysql:host=r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=dfvv81lj6eklmtd7";

    $username = 'i8c6txpjqjnv3m2z';
    $password = 'dx22ak3fex0owwm2';
    
    try
    {
    $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) 
    {

    $error_message = 'Database Error!';

    $error_message .= $e->getMessage();

    echo $error_message;

    exit();

    }
?>
