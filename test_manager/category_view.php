<div class="container-edit">
<main>
    <?php foreach ($categories as $category) : ?>
    <a href="index.php?category_id=<?php echo $category['category_id']; ?>&action=test_list_view">
        <?php echo $category['category']; ?>
    </a><br>
    <?php endforeach; ?>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_category_view">
        <button type="submit">Add category</button>
    </form>
</main>
</div>