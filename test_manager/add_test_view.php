<div class="container-edit">
<main>
    <form action="index.php" method="post">
        <input type="hidden" name="category_id" value=<?php echo $category_id ?>>
        <button type="submit" name="action" value="test_list_view" class="back">&#8249;</button>
    </form>
    <h2> Add new test for <?php echo get_category_with($category_id)['category']; ?> category: </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_test">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">

        <input type="text" name="test_name" placeholder="Test Name"><br>
        <h2> Please add at least 10 questions for test:</h2>
        <?php for ($i=0; $i < 10; $i++) { ?>
            <div class="test_section">
            <input type="text" name="question<?php echo $i;?>" placeholder="Question?"><br>
            <?php for ($j=0; $j < 4; $j++) { ?>
                <input type="text" name="answer<?php echo $i.$j;?>" placeholder="Answer?">
                <label>
                    <input type="checkbox" name="answer_is_right<?php echo $i.$j;?>" value="1">
                Correct?</label>
            <?php } ?>
            </div>
        <?php } ?>
        <button type="submit">Submit</button>
    </form>
</main>
            </div>