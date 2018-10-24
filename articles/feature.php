<?php 
session_start(); 

$id = $_GET['id'];

	$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
	$dbusername = "converyj";
	$dbpassword = "HUgT86Fga#97";

	$pdo = new PDO($dsn, $dbusername, $dbpassword); 

	// check if user exists if not add them to the user table
	$stmt = $pdo->prepare("
		SELECT * FROM `article` 
		WHERE `article`.`articleID` = '$id'");

	$stmt->execute();

	
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
						<a href="../home.php">Home</a>
					</li>
					<li>
						<a href="../about.php">About</a>
					</li>
					<li>
						<a href="../contact.html">Contact</a>
					</li>
					<li>
						<a href="../logout.php">Logout</a>
					</li>
				</ul>
			</nav>
			
		</header>
		<main>
			<!-- if role = admin - edit title, paragraph, featured article -->
			<a href="../home.php">Go Back</a>
			<section>
				<h2>News . Feature</h2><hr>
				<article> 
					<?php
					//show records (process results)
					$row = $stmt->fetch();   
					?> 
					<h3><?php echo($row['title']); ?></h3>
					<img src='../images/<?php echo($row['image']); ?>' width="250" height="250"/> 
					<p>By <?php echo($row['author']); ?></p>
					<a href="../process-likes.php?id=<?php echo($row['articleID']); ?> ">
							<img src="../images/like.png" alt="like" width="20" height="20"/>
						</a>
						<a href="../process-likes.php?id=<?php echo($row['articleID']); ?> ">
							<img src="../images/unlike.png" alt="unlike" width="20" height="20"/>
						</a>
					<p><?php echo($row['content']); ?></p>
					<a href="<?php echo($row['link']); ?>">External Source</a>
				</article>
				
			</section>
		</main>
		<footer>
			<h3>Cookies</h3>
			<p>The website uses cookies. You can deactivate or block cookies either by changing the settings within our Privacy Preference Centre or within your Browser. Please accept cookies for this site.</p>
			<a href="#">Accept Cookies</a>
		</footer>
	</body>
</html>