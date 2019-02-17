<?php include '../view/header_account.php'; ?>
<div class="container-edit">
<main>
    <h1>Edit Account</h1>
    <div id="edit_account_form">
    <form action="index.php" method="post">
        <label>E-Mail:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email); ?>">
        
        <label>First Name:</label>
        <input type="text" name="first_name" 
               value="<?php echo htmlspecialchars($first_name); ?>">
        <?php echo $fields->getField('first_name')->getHTML(); ?>
        
        <label>Last Name:</label>
        <input type="text" name="last_name" 
               value="<?php echo htmlspecialchars($last_name); ?>">
        <?php echo $fields->getField('last_name')->getHTML(); ?>
		
		<label>Address:</label>
        <input type="text" name="address" 
               value="<?php echo htmlspecialchars($address); ?>">
        <?php echo $fields->getField('address')->getHTML(); ?>
		
		<label>Contact Number</label>
        <input type="text" name="phone_number" 
               value="<?php echo htmlspecialchars($phone_number); ?>">
        <?php echo $fields->getField('phone_number')->getHTML(); ?>

        <label>New Password:</label>
        <input type="password" name="password_1">&nbsp;&nbsp;
        <?php echo $fields->getField('password_1')->getHTML(); ?>
        <span class="error"><?php echo $password_message; ?></span>

        <label>Retype Password:</label>
        <input type="password" name="password_2">
        <?php echo $fields->getField('password_2')->getHTML(); ?>

        <label>&nbsp;</label>
        <button type="submit" name="action" name="update_account">Update</button>
        <button type="submit" name="action">Cancel</button>
    </form>
    </div>
</main>
</div>
<?php include '../view/footer.php'; ?>
