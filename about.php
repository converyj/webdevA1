<?php 
	$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
	$dbusername = "converyj";
	$dbpassword = "HUgT86Fga#97";

	$pdo = new PDO($dsn, $dbusername, $dbpassword); 

	// check if user exists if not add them to the user table
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jaime Convery - Assignment 1</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<header>
			<h1><img src="" />immnewsnetwork.com</h1>
			<nav>
				<ul>
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
				</ul>
			</nav>
			
		</header>
		<main>
			<!-- if role = admin edit text -->
			<h1>About</h1>

			<?php 
			$stmt = $pdo->prepare("
								SELECT * FROM `pages` 
								WHERE `type` = 'Desc'");

					$stmt->execute();

					$row = $stmt->fetch();   
			?>
			<p><?php echo($row['content']); ?></p>
		</main>
		<footer>
			<h3>Cookies</h3>
			<p>The website uses cookies. You can deactivate or block cookies either by changing the settings within our Privacy Preference Centre or within your Browser. Please accept cookies for this site.</p>
			<a href="#">Accept Cookies</a>
		</footer>
	</body>
</html>