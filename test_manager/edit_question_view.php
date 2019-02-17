<div class="container-edit">
<main>
    <form action="index.php" method="post">
        <label> Question: <br>
        <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
        <input type="text" name="question" value="<?php echo $question['question']; ?>">
        </label>
        <br>
        Answers: <br>
        <?php foreach ($answers as $answer) { ?>
            <input type="text" name="answer<?php echo $answer['answer_id']; ?>" value="<?php echo $answer['answer']; ?>">
            <label>
            <input type="checkbox" name="is_right<?php echo $answer['answer_id']; ?>" value="1" <?php if ($answer['is_right'] == 1) {?> checked <?php } ?> >
            Correct?</label>
        <?php } ?>
        <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
        <button type="submit" name="action" value="edit_test_view">Cancel</button>
        <button type="submit" name="action" value="edit_question">Submit</button>
    </form>
</main>
</div>