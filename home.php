<?php 
session_start(); 
	$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
	$dbusername = "converyj";
	$dbpassword = "HUgT86Fga#97";

	$pdo = new PDO($dsn, $dbusername, $dbpassword); 
echo(var_dump($_SESSION));
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
			<!-- if role = admin - edit title, paragraph, featured article -->
			<?php 
			$stmt = $pdo->prepare("
								SELECT * FROM `pages` 
								WHERE `pages`.`type` = 'Title'");

					$stmt->execute();

					$row = $stmt->fetch();   
			?>
			<h2><?php echo($row['content']); ?></h2>
			<?php 
			$stmt = $pdo->prepare("
								SELECT * FROM `pages` 
								WHERE `pages`.`type` = 'Paragraph'");

					$stmt->execute();

					$row = $stmt->fetch();   
			?>
			<p><?php echo($row['content']); ?></p>
			<section>
				<h2>News</h2><hr>
				<article> 
					<?php
					//show records (process results)
					$stmt = $pdo->prepare("
								SELECT * FROM `article` 
								WHERE `article`.`category` = 'Feature'");

					$stmt->execute();

					$row = $stmt->fetch();   
					?> 
					<h3><?php echo($row['title']); ?></h3>
					<img src='images/<?php echo($row['image']); ?>' width="250" height="250"/> 
					<p>By <?php echo($row['author']); ?></p>
					<p><?php echo($row['content']); ?></p>
					<a href="articles/feature.php?id=<?php echo($row['articleID']); ?>">Read More</a>
				</article>
				<h2>Industry</h2><hr>
				<?php 
				$stmt = $pdo->prepare("
					SELECT * FROM `article` 
					WHERE `article`.`category` = 'Industry'");

				$stmt->execute();
				?>
				<!-- admins and authors can add and edit articles
				admins can only delete articles -->
				<?php 
				while ($row = $stmt->fetch()) {
				?>
					<article>
						<h3><?php echo($row['title']); ?></h3>
						<img src='images/<?php echo($row['image']); ?>' width="250" height="250"/> 
						<p>By <?php echo($row['author']); ?></p>
						<p><?php echo($row['preview']); ?></p>
						<a href="articles/industry.php?id=<?php echo($row["articleID"]); ?>">Read More</a>
					</article>
				<?php } ?>
				<h2>Technical</h2><hr>
				<?php 
				$stmt = $pdo->prepare("
					SELECT * FROM `article` 
					WHERE `article`.`category` = 'Technical'");

				$stmt->execute();
				?>
				<!-- admins and authors can add and edit articles
				admins can only delete articles -->
				<?php 
				while ($row = $stmt->fetch()) {
				?>
					<article>
						<h3><?php echo($row['title']); ?></h3>
						<img src='images/<?php echo($row['image']); ?>' width="250" height="250"/> 
						<p>By <?php echo($row['author']); ?></p>
						<p><?php echo($row['preview']); ?></p>
						<a href="articles/technical.php?id=<?php echo($row['articleID']); ?>">Read More</a>
					</article>
				<?php } ?>
				<h2>Career</h2><hr>
				<?php 
				$stmt = $pdo->prepare("
					SELECT * FROM `article` 
					WHERE `article`.`category` = 'Career'");

				$stmt->execute();
				while ($row = $stmt->fetch()) {
				?>
					<article>
						<h3><?php echo($row['title']); ?></h3>
						<img src='images/<?php echo($row['image']); ?>' width="250" height="250"/> 
						<p>By <?php echo($row['author']); ?></p>
						<p><?php echo($row['preview']); ?></p>
						<a href="articles/career.php?id=<?php echo($row['articleID']); ?>">Read More</a>
					</article>
				<?php } ?>
			</section>
			<table>
				<tr>
					<th colspan="6">Number of Visitors Each Month</th>
				</tr>
				<tr>
					<th>Apr</th>
					<th>May</th>
					<th>Jun</th>
					<th>Jul</th>
					<th>Aug</th>
					<th>Sep</th>
				</tr>
				<tr>
					<td>20</td>
					<td>25</td>
					<td>15</td>
					<td>12</td>
					<td>10</td>
					<td>100</td>
				</tr>
			</table>
		</main>
		<footer>
			<h3>Cookies</h3>
			<p>The website uses cookies. You can deactivate or block cookies either by changing the settings within our Privacy Preference Centre or within your Browser. Please accept cookies for this site.</p>
			<a href="#">Accept Cookies</a>
		</footer>
	</body>
</html>