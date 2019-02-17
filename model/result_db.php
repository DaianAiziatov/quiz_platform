<?php

function get_all_results() {
    global $db;
    $query = 'SELECT * FROM results';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function add_result($user_id,
                    $test_id,
                    $score,
                    $start_date,
                    $end_date){
    global $db;
    $query = '
    INSERT INTO results (user_id, test_id, score, start_date, end_date)
    VALUES (:user_id, :test_id, :score, :start_date, :end_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':test_id', $test_id);
    $statement->bindValue(':score', $score);
    $statement->bindValue(':start_date', $start_date);
    $statement->bindValue(':end_date', $end_date);
    $statement->execute();
    $result_id = $db->lastInsertId();
    $statement->closeCursor();
    return $result_id;
}

function update_result($result_id,
                        $score,
                        $end_date){
    global $db;
    $query = '
    UPDATE results
    SET score = :score,
        end_date = :end_date
    WHERE result_id = :result_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':result_id', $result_id);
    $statement->bindValue(':score', $score);
    $statement->bindValue(':end_date', $end_date);
    $statement->execute();
    $statement->closeCursor();
}

function get_results_for($user_id){
    global $db;
    $query = 'SELECT * FROM results WHERE user_id = :user_id';
    $statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_results_for_user_with_order($user_id, $param, $order_by){
    global $db;
    if ($user_id == null) {
        $query = 'SELECT * FROM results';
    } else {
        $query = 'SELECT * FROM results WHERE user_id = :user_id';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    if ($order_by == 'asc') {
        usort($results, function ($item1, $item2) use (&$param) {
        return $item1[$param] <=> $item2[$param];
        });
    } else {
        usort($results, function ($item1, $item2) use (&$param) {
        return $item2[$param] <=> $item1[$param];
        });
    }
    return $results;
}

function get_passed_results(){
    global $db;
    $query = 'SELECT * FROM results WHERE score >= 80';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_failed_results(){
    global $db;
    $query = 'SELECT * FROM results WHERE score < 80';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>