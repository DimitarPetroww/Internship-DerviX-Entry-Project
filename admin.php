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
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="./index.php">Job Offers</a></h1>
			<h1 class="site-title"><a href="./create.php">Create Job</a></h1>
		</header>

		<ul class="jobs-listing">
            <?php
            $db = new mysqli("localhost", "root", "", "devriX");
            $result = $db->query("SELECT * FROM jobs");
            $jobs = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($jobs as $job) {
                echo "
                <li class=job-card>
				<div class=job-primary>
					<h2 class=job-title><a href=./single.php?search=$job[id]>$job[title]</a></h2>
                <div class=job-meta>
						<a class=meta-company href=./single.php?search=$job[id]>$job[company]</a>
						<span class=meta-date>Posted 14 days ago</span>
					</div>
				</div>
				<div class=job-edit>
					<a href=./edit.php?id=$job[id]>Edit</a>
					<a href=./delete.php?id=$job[id]>Delete</a>
				</div>
			</li>";
            }
            ?>
		</ul>
		
		<footer class="site-footer">
			<p>Copyright 2020 | Developer links: 
				<a href="./admin.php">Admin</a>,
				<a href="./index.php">Home</a>
			</p>
		</footer>
	</div>
</body>
</html>