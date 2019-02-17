<div class="container-edit">
<main>
    <form action="index.php" method="post">
        <input type="hidden" name="category_id" value=<?php echo $category_id ?>>
        <button type="submit" name="action" value="test_list_view" class="back">&#8249;</button>
    </form>
    <form action="index.php" method="post">
        <label> Test name: <br>
            <input type="text" name="test_name" value="<?php echo $test['theme']?>">
        </label>
        <input type="hidden" name="test_id" value=<?php echo $test_id ?>>
        <button type="submit" name="action" value="edit_test_name"> Edit </button>
        <button type="submit" name="action" value="add_question_view"> Add question </button>
    </form>
    <h3>Questions: </h3>
    <ol>
    <?php foreach ($questions as $question) { ?>
        <li>
            <?php echo $question['question']; ?>
            <form action="index.php" method="post">
                <input type="hidden" name="test_id" value=<?php echo $test_id ?>>
                <input type="hidden" name="category_id" value=<?php echo $category_id ?>>
                <input type="hidden" name="question_id" value="<?php echo $question['question_id']; ?>">
                <button type="submit" name="action" value="edit_question_view"> Edit </button>
                <button type="submit" name="action" value="delete_question"> Delete </button>
            </form>
        </li>
        <ul>
            <?php foreach (get_answers_for($question['question_id']) as $answer) { ?>
            <li>
                    <?php echo $answer['answer']; ?>
                    <?php if ($answer['is_right'] == 1) { ?>
                        <label>(Correct)</label>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        
    <?php } ?>
    </ol>
</main>
</div>