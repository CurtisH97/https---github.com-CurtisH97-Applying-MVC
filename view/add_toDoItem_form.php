<?php include 'header.php'; ?>

    <main>
        <h1>Add Category</h1>
        <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_ToDoItem">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Title:</label>
            <input type="text" name="title"><br>

            <label>Description:</label>
            <input type="text" name="description"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add ToDoItem"><br>
        </form>
        <p><a href="index.php?action=list_products">View ToDoList</a></p>
    </main>

<?php include 'footer.php'; ?>