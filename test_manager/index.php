<?php 
    require_once('../util/main.php');
    //require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
    require_once('../model/test_db.php');
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {        
            $action = 'category';
        }
    }
    include '../view/header_admin.php';
    switch ($action) {
        // done
        case 'category':
            unset($_SESSION['category_id']);
            $categories = get_categories();
            include 'category_view.php';
            break;
        // done
        case 'add_category_view':
            include 'add_category_view.php';
            break;
        // done
        case 'add_category':
            $category_name = filter_input(INPUT_POST, 'category_name');
            $description = filter_input(INPUT_POST, 'description');
            add_category($category_name, $description);
            redirect(".");
            break;
        // done
        case 'test_list_view':
            if (!isset($_SESSION['category_id'])) {
                $_SESSION['category_id'] = filter_input(INPUT_GET, 'category_id');
                if (!isset($_SESSION['category_id'])) {
                    $_SESSION['category_id'] = filter_input(INPUT_POST, 'category_id');
                }
            }
            $category_id = $_SESSION['category_id'];
            $category = get_category_with($category_id);
            $tests = get_all_tests_for($category_id);
            include 'test_list_view_manager.php';
            break;
        // done
        case 'add_test_view':
            $category_id = $_SESSION['category_id'];
            include 'add_test_view.php';
            break; 
        // done 
        case 'add_test':
            $category_id = $_SESSION['category_id'];
            $test_name = filter_input(INPUT_POST, 'test_name');
            $test_id = add_test($category_id, $test_name);
            for ($i=0; $i < 10; $i++) { 
                $question = filter_input(INPUT_POST, 'question'.$i);
                if (!empty($question)) {
                    $question_id = add_question($test_id, $question);
                    for ($j=0; $j < 4; $j++) { 
                        $answer = filter_input(INPUT_POST, 'answer'.$i.$j);
                        if (!empty($answer)) {
                            $is_right = filter_input(INPUT_POST, 'answer_is_right'.$i.$j);
                            if (!isset($is_right)) {
                                $is_right = 0;
                            }
                            add_answer($question_id, $answer, $is_right);
                        }
                    }
                }
                
            }
            $category_id = $_SESSION['category_id'];
            $category = get_category_with($category_id);
            $tests = get_all_tests_for($category_id);
            include 'test_list_view_manager.php';
            break; 
        case 'edit_test_name':
            $test_name = filter_input(INPUT_POST, 'test_name');
            $test_id = filter_input(INPUT_POST, 'test_id');
            update_test($test_id, $test_name);
        case 'edit_test_view':
            $category_id = $_SESSION['category_id'];
            $test_id = filter_input(INPUT_POST, 'test_id');
            $test = get_test_with($test_id);
            $questions = get_all_questions_for($test_id);
            include 'edit_test_view.php';
            break;
        case 'edit_test':
            $test_id = filter_input(INPUT_POST, 'test_id');
            $test_name = filter_input(INPUT_POST, 'test_name');
            $description = filter_input(INPUT_POST, 'description');
            update_test($test_id, $test_name, $description);
            include 'test_list_view_manager.php';
            break;
        case 'edit_question_view':
            $category_id = $_SESSION['category_id'];
            $test_id = filter_input(INPUT_POST, 'test_id');
            $question_id = filter_input(INPUT_POST, 'question_id');
            $question = get_question_with($question_id);
            $answers = get_answers_for($question_id);
            include 'edit_question_view.php';
            break;
        case 'edit_question':
            $category_id = $_SESSION['category_id'];
            $test_id = filter_input(INPUT_POST, 'test_id');
            $question_id = filter_input(INPUT_POST, 'question_id');
            $question = filter_input(INPUT_POST, 'question');
            update_question($question_id, $question);
            foreach (get_answers_for($question_id) as $answer) {
                $answer_id = $answer['answer_id'];
                $answer_text = filter_input(INPUT_POST, 'answer'.$answer_id);
                $answer_is_right = filter_input(INPUT_POST, 'is_right'.$answer_id);
                if (!isset($answer_is_right)) {
                    $answer_is_right = 0;
                }
                update_answer($answer_id, $answer_text, $answer_is_right);
            }
            $test = get_test_with($test_id);
            $questions = get_all_questions_for($test_id);
            include 'edit_test_view.php';
            break;
        case 'disable':
            $test_id = filter_input(INPUT_POST, 'test_id');
            disable($test_id);
            $category_id = $_SESSION['category_id'];
            $category = get_category_with($category_id);
            $tests = get_all_tests_for($category_id);
            include 'test_list_view_manager.php';
            break;
        case 'enable':
            $test_id = filter_input(INPUT_POST, 'test_id');
            enable($test_id);
            $category_id = $_SESSION['category_id'];
            $category = get_category_with($category_id);
            $tests = get_all_tests_for($category_id);
            include 'test_list_view_manager.php';
            break;
        case 'add_question_view':
            $category_id = $_SESSION['category_id'];
            $test_id = filter_input(INPUT_POST, 'test_id');
            include 'add_question_view.php';
            break;
        case 'add_question':
            $category_id = $_SESSION['category_id'];
            $test_id = filter_input(INPUT_POST, 'test_id');
            $question = filter_input(INPUT_POST, 'question');
            $question_id = add_question($test_id, $question);
            for ($i=0; $i < 4; $i++) {
                $answer = filter_input(INPUT_POST, 'answer'.$i);
                if (!empty($answer)) {
                    $is_right = filter_input(INPUT_POST, 'is_right'.$i);
                    if (!isset($is_right)) {
                        $is_right = 0;
                    }
                    add_answer($question_id, $answer, $is_right);
                }
            }
            $test = get_test_with($test_id);
            $questions = get_all_questions_for($test_id);
            include 'edit_test_view.php';
            break;
        case 'delete_question':
            $category_id = $_SESSION['category_id'];
            $question_id = filter_input(INPUT_POST, 'question_id');
            delete_question($question_id);
            $test_id = filter_input(INPUT_POST, 'test_id');
            $test = get_test_with($test_id);
            $questions = get_all_questions_for($test_id);
            include 'edit_test_view.php';
            break;
    }
    include '../view/footer.php';
?>