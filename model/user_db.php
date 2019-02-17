<?php

function get_all_users() {
    global $db;
    $query = 'SELECT * FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function add_user($first_name, 
				  $last_name, 
				  $email, 
				  $password_1, 
				  $phone_number, 
				  $address) {
	global $db;
	$password = sha1($email . $password_1);
	$query = '
	INSERT INTO users (first_name, last_name, email, password, phone_number, address)
        VALUES (:first_name, :last_name, :email, :password, :phone_number, :address)';
	$statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
	$statement->bindValue(':phone_number', $phone_number);
	$statement->bindValue(':address', $address);
    $statement->execute();
    $user_id = $db->lastInsertId();
    $statement->closeCursor();
    return $user_id;
}

function get_user_by_name($first_name, $last_name){
    global $db;
    $query = 'SELECT * FROM users WHERE first_name = :first_name AND last_name = :last_name ';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function is_valid_user_email($email) {
    global $db;
    $query = '
        SELECT user_id FROM users
        WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function is_valid_user_login($email, $password) {
    global $db;
    $password = sha1($email . $password);
    $query = '
        SELECT * FROM users
        WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function get_user($user_id) {
    global $db;
    $query = 'SELECT * FROM users WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function get_user_by_email($email) {
    global $db;
    $query = 'SELECT * FROM users WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function update_user($user_id,
						 $first_name, 
						 $last_name, 
						 $email, 
						 $password_1,
						 $password_2, 
						 $phone_number, 
						 $address) {
    global $db;
    $query = '
        UPDATE users
        SET email = :email,
            first_name = :first_name,
            last_name = :last_name,
			phone_number = :phone_number,
			address = :address
        WHERE user_id = :user_id';
	$statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
	$statement->bindValue(':phone_number', $phone_number);
	$statement->bindValue(':address', $address);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();

    if (!empty($password_1) && !empty($password_2)) {
        $password = sha1($email . $password_1);
        $query = '
            UPDATE users
            SET password = :password
            WHERE user_id = :user_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':user_id', $customer_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>