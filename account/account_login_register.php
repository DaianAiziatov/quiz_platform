<?php include '../view/header_account_login.php'; ?>
<div class="container-login">
<main>
    <h1>Login</h1>
    <form action="index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login">
        
        <label>E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo htmlspecialchars($email); ?>" size="30">
        
        <label>Password:</label>
        <input type="password" name="password" size="30">
        <?php echo $fields->getField('password')->getHTML(); ?><br>


        <button type="submit" name="action" value="login">Login </button>
        <button type="submit" name="action" value="view_register">Register </button>
        <?php if (!empty($password_message)) : ?>         
        <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
        <?php endif; ?>
    </form>
</main>
</div>
<?php include '../view/footer.php'; ?>
