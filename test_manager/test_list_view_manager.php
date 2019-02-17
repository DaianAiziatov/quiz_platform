<div class="container-edit">
<main>
    <form action="index.php" method="post">
        <button type="submit" name="action" class="back">&#8249;</button>
    </form>
    <h2> <?php echo $category['category']; ?> </h2>
    <p> <?php echo $category['description']; ?></p>

    <?php foreach ($tests as $test) : ?>
    <div class="test_section">
    <label>
        <?php 
            echo $test['theme']; 
            if ($test['is_disabled'] == 1) {
                echo ' (Disabled)'; 
            }
        ?>
    </label>
    <form action="index.php" method="post">
        <input type="hidden" name="test_id" value="<?php echo $test['test_id']; ?>">
        <input type="hidden" name="category_name" value="<?php echo $category['category']; ?>">
        <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
        <button type="submit" name="action" value="edit_test_view">Edit</button>
        <?php if ($test['is_disabled'] == 0) { ?>
            <button type="submit" name="action" value="disable">Disable</button>
        <?php } else { ?>
            <button type="submit" name="action" value="enable">Enable</button>
        <?php } ?>
    </form>
    </div>
    <?php endforeach; ?>
    <form action="index.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
        <input type="hidden" name="action" value="add_test_view">
        <input type="submit" value="Add Test">
    </form>
</main>
        </div>