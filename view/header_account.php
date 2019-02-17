<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Quiz</title>
    <link rel="stylesheet" type="text/css"
          href="../main.css">
</head>

<body>
<header>
    <h1><a href="index.php">
        <?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?>
        </a></h1>
	<nav id="nav">
        <ul>
            <li><a href="index.php">Profile</a></li>
            <li><a href="../tests/index.php">Tests</a></li>
        </ul>
	</nav>
</header>