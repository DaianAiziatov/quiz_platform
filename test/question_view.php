<?php include '../view/header_intest.php'; ?>
<div class="container-edit">
<main>
        <form action="." method="post">
            <h2><?php echo ($_SESSION['page_count']+1).". ".$question['question']; ?></h2>
            <?php foreach (get_answers_for($question['question_id']) as $answer) : ?>
            <label>
            <input type="radio" name="answer" value="<?php echo $answer['is_right']; ?>" > 
            <?php echo $answer['answer']; ?> </label>
                
            <?php endforeach; ?>
            <input type="hidden" name="action" value="next">
            <input type="submit" value="Next">
        </form>
</main>
</div>
<?php include '../view/footer.php'; ?>