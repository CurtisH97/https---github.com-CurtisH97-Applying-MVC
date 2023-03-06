<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
 {

    $action = filter_input(INPUT_GET, 'action');

    if ($action == NULL)
     {
        $action = 'list_products';
    }
}

if ($action == 'list_products')
 {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE)
     {
        $category_id = 1;
    }

    $category_name = get_category_name($category_id);

    $categories = get_categories();

    $products = get_toDoItems_by_category($category_id);

    include('view/item_list.php');

} 
else if ($action == 'delete_ToDoItem') 
{
    $itemNum = filter_input(INPUT_POST, 'itemNum', 
            FILTER_VALIDATE_INT);

    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE ||
            $itemNum == NULL || $itemNum == FALSE) 
            {
        $error = "Missing or incorrect product id or category id.";

        include('view/error.php');
    } 
    else 
    { 
        delete_ToDoItem($itemNum);
        header("Location: .?category_id=$category_id");
    }
} 
else if ($action == 'show_add_form') 
{
    $categories = get_categories();
    include('view/add_toDoItem_form.php');    
} 
else if ($action == 'add_ToDoItem') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    if ($category_id == NULL || $category_id == FALSE || $title == NULL || 
            $description == NULL) {
        $error = "Invalid product data. Check all fields and try again.";
        include('view/error.php');
    } else { 
        add_ToDoItem($category_id, $title, $description);
        header("Location: .?category_id=$category_id");
    }
} 
else if ($action == 'list_categories')
 {
    $categories = get_categories();
    include('view/category_list.php');
} 
else if ($action == 'add_category') 
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} 
else if ($action == 'delete_category') 
{
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>