<?php 
    require_once('../util/main.php');
    //require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
    require_once('../model/test_db.php');
    require_once('../model/result_db.php');
    require_once('../model/user_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {        
            $action = 'results_view';
        }
    }
    include '../view/header_admin.php';
    switch($action) {
        case 'results_view':
            $results = get_all_results();
            include 'results_view.php';
            break;
        case 'show_user':
            $user_id = filter_input(INPUT_GET, 'user_id');
            $user_name = filter_input(INPUT_POST, 'user_name');
            if (isset($user_name)) {
                $first_name = explode(" ", $user_name)[0];
                $last_name = explode(" ", $user_name)[1];
                $user_id = get_user_by_name($first_name, $last_name)['user_id'];
            }
            $user = get_user($user_id);
            $param = filter_input(INPUT_GET, 'param');
            if ($param == NULL) {        
                $param = 'start_date';
            }
            $order_by = filter_input(INPUT_GET, 'order_by');
            if ($order_by == NULL) {        
                $order_by = 'asc';
            } else {
                if ($order_by == 'asc') {
                    $order_by = 'desc';
                } else {
                    $order_by = 'asc';
                }
            }
            $results = get_results_for_user_with_order($user_id, $param, $order_by);
            include 'user_info_view.php';
            break;
    }
    include '../view/footer.php'
?>