<?php 
session_start();

if($_SESSION['logged-in'] == false){
	echo("You are not allowed to view this page");
	?><a href="login.html">Go to login</a><?php
}else{

//perform database insert using form values;
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

$stmt = $pdo->prepare("SELECT * FROM `article`");

$stmt->execute();
?>

<!doctype html>
<html>
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Dashboard</h1>

		
				<h2>Articles</h2>
				<a href="insert-form.html">Add Article</a>
				
				<section id="article-records">
					<div>
						<table>
							<tr>
								
								<th colspan="2">Action</th>
								<th>Category</th>
								<th>ArticleID</th>
								<th>Title</th>
								<th>Author</th>
							</tr>
							<?php
				//show records (process results)
				while($row = $stmt->fetch()) {     
				//echo($row["email"]); //or $row[0];
				?>
							<tr>
								<td><span><a href="cms_delete.php?id=<?php echo($row["articleID"]);?>">Delete</a></span> </td>
								<td><span><a href="cms_edit.php?id=<?php echo($row["articleID"]);?>">Edit</a></span></td>
								<td>
									<?php echo($row['category']); ?>
								</td>
								<td>
									<?php echo($row['articleID']); ?>
								</td>
								<td>
									<?php echo($row['title']); ?>
								</td>
								<td>
									<?php echo($row['author']); ?>
								</td>
							</tr>
							<?php }
				?>
						</table>
					</div>
				</section>
				
				
					
			
		
		
	</body>
</html>

<?php } ?>