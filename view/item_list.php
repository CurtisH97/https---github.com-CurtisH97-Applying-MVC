<?php include 'header.php'; ?>
<main>
    <h1>ToDoList</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>View by Category</h2>
        <form action="index.php" method="get">

        <label for="category_id">Select a Category:</label>

        <select id="category_id" name="category_id">

        <?php foreach ($categories as $category) : ?>

        <option value="<?php echo $category['categoryID']; ?>" <?php if ($category['categoryID'] == $category_id) echo 'selected'; ?>>

        <?php echo $category['categoryName']; ?>
        
        </option>
        <?php endforeach; ?>
        </select>
        <input type="submit" value="submit">
</form>        
    </aside>

    <section>
        <!-- display a table of ToDoItems -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['Title']; ?></td>
                <td><?php echo $product['Description']; ?></td>
                <td><form action="." method="post">
                <input type="hidden" name="action"
                           value="delete_ToDoItem">
                <input type="hidden" name="itemNum"
                           value="<?php echo $product['ItemNum']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add ToDoItems</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>        
    </section>
    <?php include 'footer.php'; ?>