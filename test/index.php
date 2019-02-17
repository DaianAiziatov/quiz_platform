<?php 
require_once('../util/main.php');
require_once('../model/test_db.php');
require_once('../model/user_db.php');
require_once('../model/result_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'first_question';
    }
}

switch($action) {
    case 'first_question':
        $test_id = filter_input(INPUT_POST, 'test_id');
        $start_date = date('m/d/Y h:i:s a', time());
        $_SESSION['result_id'] = add_result($_SESSION['user']['user_id'], $test_id, 0, $start_date, 0);
        $_SESSION['questions'] = get_rand_questions_for($test_id);
        $_SESSION['category_name'] = filter_input(INPUT_POST, 'category_name');
        $_SESSION['page_count'] = 0;
        $_SESSION['answers'] = array();
        $question = $_SESSION['questions'][$_SESSION['page_count']];
        include 'question_view.php';
        break;
    case 'next':
        $previous_answer  = filter_input(INPUT_POST, 'answer');
        $_SESSION['answers'][$_SESSION['page_count']] = $previous_answer;
        $_SESSION['page_count'] += 1;
        if ($_SESSION['page_count'] == count($_SESSION['questions'])) {
            $questions = $_SESSION['questions'];
            $category_name = $_SESSION['category_name'];
            $result = 0;
            $answers = $_SESSION['answers'];
            foreach ($answers as $answer) {
                $result += $answer;
            }
            $result_in_perc = ($result / count($_SESSION['questions'])) * 100;
            $end_date = date('m/d/Y h:i:s a', time());
            update_result($_SESSION['result_id'], $result_in_perc, $end_date);
            unset($_SESSION['result_id']);
            unset($_SESSION['questions']);
            unset($_SESSION['category_name']);
            unset($_SESSION['page_count']);
            unset($_SESSION['answers']);
            include 'test_result.php';
        } else {
            $question = $_SESSION['questions'][$_SESSION['page_count']];
            include 'question_view.php';
        }
        break;
}

?>
