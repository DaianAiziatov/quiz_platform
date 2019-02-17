<div class="container-edit">
<main>
    <h2>Add question for test "<?php echo get_test_with($test_id)['theme']; ?>."</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
        <input type="text" name="question" placeholder="Question?"><br>
        <?php for ($j=0; $j < 4; $j++) { ?>
            <input type="text" name="answer<?php echo $j;?>" placeholder="Answer?">
            <label>
                <input type="checkbox" name="is_right<?php echo $j;?>" value="1">
            Correct?</label>
        <?php } ?>
        <button type="submit" name="action" value="edit_test_view">Cancel</button>
        <button type="submit" name="action" value="add_question">Submit</button>
    </form>
</main>
</div>