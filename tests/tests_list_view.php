<?php 
require_once('../util/main.php');
require_once('../model/test_db.php');

$category_id = filter_input(INPUT_GET, 'category_id');;
$category = get_category_with($category_id);
$tests = get_all_tests_for($category_id);
include '../view/header_intest.php';
?>
<div class="container-edit">
<main>
    <form action="index.php" method="post">
        <button type="submit" name="action" class="back">&#8249;</button>
    </form>
    <h2> <?php echo $category['category']; ?> </h2>
    <p> <?php echo $category['description']; ?></p> 
    <h2>Tests: </h2>
    <?php foreach ($tests as $test) : ?>
    <?php if ($test['is_disabled'] == 0) { ?>
        <form action="../test/index.php" method="post">
            <label><?php echo $test['theme']; ?>:
            <input type="hidden" name="test_id" value="<?php echo $test['test_id']; ?>">
            <input type="hidden" name="category_name" value="<?php echo $category['category']; ?>">
            <input type="submit" value="Start">
            </label>
        </form>
    <?php } ?>
    <?php endforeach; ?>

</main>
    </div>
<?php include '../view/footer.php' ?>