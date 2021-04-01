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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		h1{
			display: inline-block;
			margin: 10px;
		}
		form.searchForm input[type=text] {
  			padding: 10px;
  			font-size: 17px;
  			border: 1px solid grey;
  			float: left;
  			width: 80%;
  			background: #f1f1f1;
		}
		form.searchForm button {	
  			float: left;
  			width: 20%;
  			padding: 10px;
  			background: #2196F3;
  			color: white;
  			font-size: 17px;
  			border: 1px solid grey;
  			border-left: none; /* Prevent double borders */
  			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="./index.php">Job Offers</a></h1>
			<h1 class="site-title"><a href="./create.php">Create Job</a></h1>
			<form class="searchForm" action="./index.php" method="post">
  				<input type="text" placeholder="Search.." name="search">
  				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</header>
        <?php
        echo '<ul class="jobs-listing">';
        $db = new mysqli("localhost", "root", "", "devriX");
		$result;
		if(isset($_POST["search"])) {
			$search = $_POST["search"];
			$result = $db->query("SELECT * FROM jobs 
            WHERE 
            title LIKE '%{$search}%'
            OR
            company LIKE '%{$search}%'");	
		}else {
			$result = $db->query("SELECT * FROM jobs");	
		}
        $jobs = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($jobs as $job) {
            echo "<li class=job-card>
				<div class=job-primary>
					<h2 class=job-title><a href=./single.php?search=$job[id]>$job[title]</a></h2>
					<div class=job-meta>
						<a class=meta-company href=./single.php?search=$job[id]>$job[company]</a>
						<span class=meta-date>Posted 14 days ago</span>
					</div>
					<div class=job-details>
						<span class=job-location>The Hague (The Netherlands)</span>
						<span class=job-type>Contract staff</span>
					</div>
				</div>
				<div class=job-logo>
					<div class=job-logo-box>
						<img src=https://i.imgur.com/ZbILm3F.png alt=''>
					</div>
				</div>
			</li>";
        }
        echo '</ul>';
        ?>
		<footer class="site-footer">
			<p>Copyright 2020 | Developer links:
                <a href="admin.php">Admin</a>,
                <a href="./index.php">Home</a>
			</p>
		</footer>
	</div>
</body>
</html>