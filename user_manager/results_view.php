<div class="container-edit">
<main>
    <?php if (count($results) != 0 ) { ?>
    <h2>Users</h2>
    <form action="index.php" method="post">
        <select name="user_name">
        <?php foreach (get_all_users() as $user) { ?>
            <option>
                <?php echo $user['first_name']." ".$user['last_name']?>
            </option>
        <?php } ?>
        </select>
        <input type="hidden" name="action" value="show_user">
        <button type="submit">Get user info</button>
    </form>
    <h2>Results</h2>
    <label>Click on user name for additional info</label>
	<table>
		<tr>
            <th>User Name</th>
			<th>Test</th>
			<th>Score</th>
			<th>Start date</th>
			<th>End date</th>
		</tr>
		<?php foreach ($results as $result) : ?>
		<tr>
            <th><a href='index.php?action=show_user&user_id=<?php echo $result['user_id']; ?>'>
            <?php echo get_user($result['user_id'])['first_name']." ".get_user($result['user_id'])['last_name']?>
            </a>
            </th>
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