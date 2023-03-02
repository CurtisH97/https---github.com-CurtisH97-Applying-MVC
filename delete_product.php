<?php
require_once('database.php');

// Get IDs

$itemNum = filter_input(INPUT_POST, "itemNum", FILTER_VALIDATE_INT);

// Delete the product from the database
if ($itemNum != false) {
    $query = 'DELETE FROM todoitems
              WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('index.php');