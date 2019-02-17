<?php
require_once('../util/main.php');
//require_once('../util/secure_conn.php');
require_once('../model/user_db.php');
require_once('../model/result_db.php');
require_once('../model/admin_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view_login';
        if (isset($_SESSION['user'])) {
            $action = 'view_account';
        }
    }
}

// Set up all possible fields to validate
$validate = new Validate();
$fields = $validate->getFields();

// for the Registration page and other pages
$fields->addField('email', 'Must be valid email.');
$fields->addField('password_1');
$fields->addField('password_2');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('phone_number');


// for the Login page
$fields->addField('password');

switch ($action) {
    case 'view_register':
        // Clear user data
        $email = '';
        $first_name = '';
        $last_name = '';
        $address = '';
        $phone_number = '';
        
        include 'account_register.php';
        break;
    case 'register':
        // Store user data in local variables
        $email = filter_input(INPUT_POST, 'email');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $address = filter_input(INPUT_POST, 'address');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        
        // Validate user data       
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, true, 6, 30);
        $validate->text('password_2', $password_2, true, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->text('address', $address);       
        $validate->phone('phone_number', $phone_number, false);        

        // If validation errors, redisplay Register page and exit controller
        if ($fields->hasErrors()) {
            include 'account_register.php';
            break;
        }

        // If passwords don't match, redisplay Register page and exit controller
        if ($password_1 !== $password_2) {
            $password_message = 'Passwords do not match.';
            include 'account_register.php';
            break;
        }

        // Validate the data for the customer
        if (is_valid_user_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        
        // Add the customer data to the database
        $user_id = add_user($first_name, 
							$last_name, 
							$email, 
							$password_1, 
							$phone_number, 
							$address);
        // Store user data in session
        $_SESSION['user'] = get_user($user_id);
        redirect('.');   
        break;
    case 'view_login':
        // Clear login data
        $email = '';
        $password = '';
        $password_message = '';
        
        include 'account_login_register.php';
        break;
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        // Validate user data
        $validate->email('email', $email);
        $validate->text('password', $password, true, 6, 30);        

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'account_login_register.php';
            break;
        }
        
        // Check email and password in database
        if (is_valid_admin_login($email, $password)) {
            $_SESSION['admin'] = get_admin_by_email($email);
            redirect('../admin');
        }
        if (is_valid_user_login($email, $password)) {
            $_SESSION['user'] = get_user_by_email($email);
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include 'account_login_register.php';
            break;
        }

    case 'view_account':
        $customer_name = $_SESSION['user']['first_name'] . ' ' .
                         $_SESSION['user']['last_name'];
        $email = $_SESSION['user']['email']; 
		$address = $_SESSION['user']['address'];
		$phone_number = $_SESSION['user']['phone_number'];
        $results = get_results_for($_SESSION['user']['user_id']);
        
        include 'account_view.php';
        break;
    case 'view_account_edit':
        $email = $_SESSION['user']['email'];
        $first_name = $_SESSION['user']['first_name'];
        $last_name = $_SESSION['user']['last_name'];
		$address = $_SESSION['user']['address'];
		$phone_number = $_SESSION['user']['phone_number'];

        $password_message = '';        

        include 'account_edit.php';
        break;
    case 'update_account':
        // Get the customer data
        $user_id = $_SESSION['user']['user_id'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
		$address = filter_input(INPUT_POST, 'address');
		$phone_number = filter_input(INPUT_POST, 'phone_number');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $password_message = '';

        // Get the old data for the customer
        $old_user = get_user($user_id);

        // Validate user data
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, false, 6, 30);
        $validate->text('password_2', $password_2, false, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);  
		$validate->text('address', $address);
        $validate->text('phone_number', $phone_number);   
        
        // Check email change and display message if necessary
        if ($email != $old_user['email']) {
            display_error('You can\'t change the email address for an account.');
        }

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'account/account_edit.php';
            break;
        }
        
        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {            
            if ($password_1 !== $password_2) {
                $password_message = 'Passwords do not match.';
                include 'account/account_edit.php';
                break;
            }
        }

        // Update the customer data
        update_user($user_id,
					$first_name, 
					$last_name, 
					$email, 
					$password_1,
					$password_2, 
					$phone_number, 
					$address);

        // Set the new customer data in the session
        $_SESSION['user'] = get_user($user_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('.');
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>