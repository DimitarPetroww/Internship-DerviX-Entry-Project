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
        #create-form {
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
        #createBtn {
            border: 0;
            background: #3c71fe;
            padding: .5rem;
            color: white;
            margin: 1rem 0;
            text-transform: uppercase;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="./index.php">Job Offers</a></h1>
		</header>
        <h1>Create offer</h1>
        <form id="create-form" action="./createJob.php" method="post">
            <label for="title">Title: </label>
            <input type="text" id="title" name="title">
            <label for="description">Description: </label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <label for="company">Company: </label>
            <input type="text" id="company" name="company">
            <label for="salary">Salary: </label>
            <input type="number" id="salary" name="salary">
            <input type="submit" value="Edit" id="createBtn">
        </form>
		<footer class="site-footer">
			<p>Copyright 2020 | Developer links: 
				<a href="./admin.php">Admin</a>,
				<a href="./index.php">Home</a>
			</p>
		</footer>
	</div>
</body>
</html>