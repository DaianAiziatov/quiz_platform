<?php

function get_categories() {
	global $db;
    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category_with($category_id){
    global $db;
    $query = 'SELECT * FROM categories WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

function add_category($category_name, $description){
    global $db;
    $query = 'INSERT INTO categories (category, description) 
        VALUES (:category_name, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function get_all_tests_for($category_id){
	global $db;
    $query = 'SELECT * FROM tests WHERE category_id = :category_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $tests = $statement->fetchAll();
    $statement->closeCursor();
    return $tests;
}

function get_test_with($test_id){
	global $db;
	$query = 'SELECT * FROM tests WHERE test_id = :test_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':test_id', $test_id);
    $statement->execute();
    $test = $statement->fetch();
    $statement->closeCursor();
    return $test;
}

function add_test($category_id, $test_name){
    global $db;
    $query = 'INSERT INTO tests (category_id, theme) 
        VALUES (:category_id, :test_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':test_name', $test_name);
    $statement->execute();
    $test_id = $db->lastInsertId();
    $statement->closeCursor();
    return $test_id;
}

function update_test($test_id, $test_name){
    global $db;
    $query = 'UPDATE tests
            SET theme = :test_name
            WHERE test_id = :test_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':test_id', $test_id);
    $statement->bindValue(':test_name', $test_name);
    $statement->execute();
    $statement->closeCursor();
}

function disable($test_id){
    global $db;
    $query = 'UPDATE tests
            SET is_disabled = 1
            WHERE test_id = :test_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':test_id', $test_id);
    $statement->execute();
    $statement->closeCursor();
}

function enable($test_id){
    global $db;
    $query = 'UPDATE tests
            SET is_disabled = 0
            WHERE test_id = :test_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':test_id', $test_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_all_questions_for($test_id) {
    global $db;
	$query = 'SELECT * FROM questions WHERE test_id = :test_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':test_id', $test_id);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
}

function get_rand_questions_for($test_id){
	global $db;
	$query = 'SELECT * FROM questions WHERE test_id = :test_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':test_id', $test_id);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
	shuffle($questions);
    return array_slice($questions, 0, 10);
}

function add_question($test_id, $question){
    global $db;
    $query = 'INSERT INTO questions (test_id, question) 
        VALUES (:test_id, :question)';
    $statement = $db->prepare($query);
    $statement->bindValue(':test_id', $test_id);
    $statement->bindValue(':question', $question);
    $statement->execute();
    $question_id = $db->lastInsertId();
    $statement->closeCursor();
    return $question_id;
}

function update_question($question_id, $question){
    global $db;
    $query = 'UPDATE questions
            SET question = :question
            WHERE question_id = :question_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->bindValue(':question', $question);
    $statement->execute();
    $statement->closeCursor();
}

function get_question_with($question_id){
	global $db;
	$query = 'SELECT * FROM questions WHERE question_id = :question_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':question_id', $question_id);
    $statement->execute();
    $question = $statement->fetch();
    $statement->closeCursor();
    return $question;
}

function get_answers_for($question_id){
	global $db;
	$query = 'SELECT * FROM answers WHERE question_id = :question_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':question_id', $question_id);
    $statement->execute();
    $answers = $statement->fetchAll();
    $statement->closeCursor();
    return $answers;
}

function update_answer($answer_id, $answer, $is_right){
    global $db;
    $query = 'UPDATE answers
            SET answer = :answer,
                is_right = :is_right
            WHERE answer_id = :answer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':answer_id', $answer_id);
    $statement->bindValue(':answer', $answer);
    $statement->bindValue(':is_right', $is_right);
    $statement->execute();
    $statement->closeCursor();
}

function add_answer($question_id, $answer, $is_right){
    global $db;
    $query = 'INSERT INTO answers (question_id, answer, is_right) 
        VALUES (:question_id, :answer, :is_right)';
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->bindValue(':answer', $answer);
    $statement->bindValue(':is_right', $is_right);
    $statement->execute();
    $statement->closeCursor();
}

function delete_question($question_id){
    global $db;
    $query = 'DELETE FROM questions WHERE question_id = :question_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->execute();
    $statement->closeCursor();
}

?>