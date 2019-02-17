<?php include '../view/header_account_login.php'; ?>
<?php 
if (!isset($password_message)) { $password_message = ''; } 
?>
<div class="container-register">
       <div id="content_register">
    <h1>Register</h1>
    <form action="index.php" method="post" id="register_form">

        <h2>User Information</h2>
        <input type="hidden" name="action" value="register">

        <label>E-Mail:
        <input type="text" name="email"
               value="<?php echo htmlspecialchars($email); ?>">
       </label>
        <label>Password:
        <input type="password" name="password_1" >
        <?php echo $fields->getField('password_1')->getHTML(); ?>
        <span class="error"><?php echo htmlspecialchars($password_message); ?></span>
       </label>
        <label>Retype Password:
        <input type="password" name="password_2" >
        <?php echo $fields->getField('password_2')->getHTML(); ?>
       </label>
        <label>First Name:
        <input type="text" name="first_name"
               value="<?php echo htmlspecialchars($first_name); ?>" 
               >
        <?php echo $fields->getField('first_name')->getHTML(); ?>
       </label>
        <label>Last Name:
        <input type="text" name="last_name"
               value="<?php echo htmlspecialchars($last_name); ?>"
               >
        <?php echo $fields->getField('last_name')->getHTML(); ?>
       </label>
        <label>Address:
        <input type="text" name="address"
               value="<?php echo htmlspecialchars($address); ?>"
               size="30">
        <?php echo $fields->getField('address')->getHTML(); ?>
       </label>
        <label>Contact Number:
        <input type="text" name="phone_number"
               value="<?php echo htmlspecialchars($phone_number); ?>"
               >
        <?php echo $fields->getField('phone_number')->getHTML(); ?>
       </label>
        <label>&nbsp;</label>
        <input type="submit" value="Register">
    </form>
    </div>
</div>
<?php include '../view/footer.php'; ?>