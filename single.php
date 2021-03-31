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
			<h2 class="site-title"><a href="./index.php">Job Offers</a></h2>
			<h2 class="site-title"><a href="./create.php">Create Job</a></h2>
		</header>

		<div class="job-single">
			<main class="job-main">
				<div class="job-card">
					<div class="job-primary">
                        <?php
                            $id = $_GET['search'];
                            $db = new mysqli("localhost", "root", "", "devriX");
                            $result = $db->query("SELECT * FROM jobs WHERE id = {$id}");
                            $job = $result->fetch_all(MYSQLI_ASSOC)[0];
                            echo "
                            <header class=job-header>
                                <h2 class=job-title><a href=#>$job[title]</a></h2>
							    <div class=job-meta>
								    <a class=meta-company href=#>$job[company]</a>
								    <span class=meta-date>Posted 14 days ago</span>
							    </div>
							    <div class=job-details>
								    <span class=job-location>The Hague (The Netherlands)</span>
								    <span class=job-type>Contract staff</span>
							    </div>
						    </header>";

						  echo "
                          <div class=job-body>
					            <p>$job[description]</p>
	                      </div>";
						?>
					</div>
				</div>
			</main>
			<aside class="job-secondary">
				<div class="job-logo">
					<div class="job-logo-box">
						<img src="https://i.imgur.com/ZbILm3F.png" alt="">
					</div>
				</div>
				<a href="#" class="button button-wide">Apply now</a>
				<a href="#">apple.com</a>
			</aside>
		</div>

		<h2 class="section-heading">Other related jobs:</h2>
		<ul class="jobs-listing">
            <?php
            $id = $_GET['search'];
            $db = new mysqli("localhost", "root", "", "devriX");
            $v1 = $db->query("SELECT * FROM jobs WHERE id = {$id}");
            $job = $v1->fetch_all(MYSQLI_ASSOC)[0];

            $description = $job['description'];
            $title = $job['title'];
            $company = $job['company'];
            $SQL = "
            SELECT * FROM jobs 
            WHERE 
            (title = '{$title}'
            OR
            company = '{$company}'
            OR
            description = '{$description}') 
            AND id != '{$id}'
            ";

            $v2 = $db->query($SQL);
            $jobs = $v2 -> fetch_all(MYSQLI_ASSOC);
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
						<img src=https://i.imgur.com/ZbILm3F.png>
					</div>
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