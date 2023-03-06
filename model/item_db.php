<?php
function get_toDoItems_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE todoitems.categoryID = :category_id
              ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_ToDoItem($itemNum) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

//delete ToDoItem
function delete_ToDoItem($itemNum) {
    global $db;
    $query = 'DELETE FROM todoitems
              WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $statement->closeCursor();
}

function add_ToDoItem($category_id, $title, $description) {
    global $db;
    $query = 'INSERT INTO todoitems
    (categoryID, Title, Description)
 VALUES
    (:category_id, :title, :description)';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':title', $title);
$statement->bindValue(':description', $description);
$statement->execute();
$statement->closeCursor();
}



?>