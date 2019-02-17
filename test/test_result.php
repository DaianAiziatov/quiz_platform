<?php include '../view/header_intest.php'; ?>
<div class="container-edit">
<main>
    <h1> Score: <?php echo $result."/".count($questions); ?>, <?php echo $result_in_perc; ?>%. </h1>
    <?php if ($result_in_perc >= 80) { ?>
        <h1> You have successfully passed the test. You are now certified in <?php echo $category_name; ?>. </h1>
    <?php } else { ?>
        <h1> Unfortunately you did not pass the test. Please try again later! </h1>
    <?php } ?>
</main>
    </div>
<?php include '../view/footer.php'; ?>