<?php 
    require_once('../util/main.php');
    //require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
    require_once('../model/result_db.php');

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'logout') {
            unset($_SESSION['admin']);
            redirect('../account/');
        }
    }

    $results = get_all_results();
    function average_score() {
        global $results;
        $total = 0;
        foreach ($results as $result) {
            $total += $result['score'];
        }
        return $total / count($results);
    }
    function curretnly_writing() {
        global $results;
        $total = 0;
        foreach ($results as $result) {
            if ($result['end_date'] == 0) {
                $total++;
            } 
        }
        return $total;
    }
    include '../view/header_admin.php';
?>
<div class="container-edit">
<main>
    <h1>Hello, <?php echo $_SESSION['admin']['first_name']." ".$_SESSION['admin']['last_name'] ?>.</h1>
    <h2>Dashboard</h2>
    <p>Passed tests: <?php echo count(get_passed_results());?></p>
    <p>Failed tests: <?php echo count(get_failed_results());?></p>
    <p>Average score: <?php echo average_score();?></p>
    <p>Currently writing tests: <?php echo curretnly_writing(); ?></p>
    <a href="../test_manager/"><h3>Test manager</h3></a>
    <a href="../user_manager/"><h3>User manager</h3></a>
    <form action="." method="post">
        <button type=submit name="action" value="logout">Logout</button>
    </form> 
</main>
</div>
<?php include '../view/footer.php' ?>