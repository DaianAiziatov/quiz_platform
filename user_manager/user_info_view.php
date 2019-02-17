<div class="container-edit">
<main>
	<form action="index.php" method="post">
        <button type="submit" name="action" value="results_view" class="back">&#8249;</button>
    </form>
    <h3>User info: </h3>
    <p> Name: <?php echo $user['first_name'].' '.$user['last_name']; ?> </p>
    <p> Email: <?php echo $user['email']?> </p>
    <p> Phone number: <?php echo $user['phone_number']?> </p>
    <p> Address: <?php echo $user['address']?> </p>
    <hr>
    <h3>Results</h3>
    <?php if (count($results) != 0 ) { ?>
	<table>
		<tr>
			<th>Test</th>
			<th><a href="index.php?user_id=<?php echo $user['user_id']; ?>&param=score&action=show_user&order_by=<?php echo $order_by; ?>">
            Score</a></th>
			<th><a href="index.php?user_id=<?php echo $user['user_id']; ?>&param=start_date&action=show_user&order_by=<?php echo $order_by; ?>">
            Start date</a></th>
			<th><a href="index.php?user_id=<?php echo $user['user_id']; ?>&param=end_date&action=show_user&order_by=<?php echo $order_by; ?>">
            End date<a/></th>
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
</main>
</div>