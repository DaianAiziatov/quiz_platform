<div class="container-edit">
<main>
    <h2> Add new category </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_category">
        <input type="text" name="category_name" placeholder="Category Name"><br>
        <label> Description: <br>
            <textarea name="description" rows="4" cols="50"></textarea>
        </label><br>
        <button type="submit" name="action">Cancel</button>
        <button type="submit">Submit</button>
    </form>
</main>
</div>