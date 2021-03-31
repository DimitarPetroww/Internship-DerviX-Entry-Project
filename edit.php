<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        #edit-form {
            max-width: 500px;
            margin: 2rem auto;
            border: 2px solid blue;
            padding: 2rem
        }
        label {
            display: block;
        }
        input, textarea {
            display: block;
            width: 100%
        }
        #editBtn {
            border: 0;
            background: #3c71fe;
            padding: .5rem;
            color: white;
            margin: 1rem 0;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="./index.php">Job Offers</a></h1>
		</header>
        <?php
        $id = $_GET['id'];
        $db = new mysqli("localhost", "root", "", "devriX");
        $result = $db->query("SELECT * FROM jobs WHERE id = {$id}");
        $job = $result->fetch_all(MYSQLI_ASSOC)[0];
        echo "
        <form id='edit-form' action=./editJob.php method='post'>
            <label for='title'>Title: </label>
            <input type='text' id='title' name='title' value=$job[title]>
            <label for='description'>Description: </label>
            <textarea name='description' id='description' cols=30 rows=10>$job[description]</textarea>
            <label for='company'>Company: </label>
            <input type='text' id='company' name='company' value=$job[company]>
            <label for='salary'>Salary: </label>
            <input type='number' id='salary' name='salary' value=$job[salary]>
            <input type='hidden' name='id' value=$id>
            <input type='submit' value='Edit' id='editBtn'>
        </form>"
        ?>
		<footer class="site-footer">
			<p>Copyright 2020 | Developer links: 
				<a href="./admin.php">Admin</a>,
				<a href="./index.php">Home</a>
			</p>
		</footer>
	</div>
</body>
</html>