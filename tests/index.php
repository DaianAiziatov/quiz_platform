<?php
require_once('../util/main.php');
require_once('../model/test_db.php');

$categories = get_categories();
include '../view/header_intest.php';
?>
<div class="container-edit">
<main>
    <h2>Categories:</h2>
    <?php foreach ($categories as $category) : ?>
    <a href="tests_list_view.php?category_id=<?php echo $category['category_id']; ?>">
        <?php echo $category['category']; ?>
    </a><br>
    <?php endforeach; ?>
</main>
</div>
<?php include '../view/footer.php'; ?>