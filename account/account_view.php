<?php 
require_once('../model/test_db.php');
include '../view/header_account.php'; ?>
<div class="container-edit">
<main>
    <h1>My Account</h1>
    <p><?php echo $customer_name . ' (' . $email . ')'; ?></p>
    <?php if (count($results) != 0 ) { ?>
    <h2>Results</h2>
	<table>
		<tr>
			<th>Test</th>
			<th>Score</th>
			<th>Start date</th>
			<th>End date</th>
		</tr>
		<?php foreach ($results as $result) : ?>
		<tr>
			<th><?php echo get_test_with($result['test_id'])['theme']; ?></th>
			<th><?php echo $result['score']; ?></th>
			<th><?php echo $result['start_date']; ?></th>
			<th><?php echo $result['end_date']; ?></th>
		</tr>
		<?php endforeach; ?>
	</table>
    <?php } else {?>
	<p> There are no any results yet. </p>
	<?php } ?>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="view_account_edit">
        <input type="submit" value="Edit Account">
    </form>
	<form action="index.php" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
    
</main>
</div>
<?php include '../view/footer.php'; ?>
