<?php

//confirm delete record
$id = $_GET['id'];

//show record to delete
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

$stmt = $pdo->prepare("
						SELECT * FROM `article` 
						WHERE `article`.`articleID` = '$id'");

$i = $stmt->execute();
if ($i == 1) {
	echo("success");
} else {
	echo ("fail");
}

$row = $stmt->fetch();
?>
<h1>Are you sure you want to delete this record?</h1>
<p>Category: <?php echo($row["category"]); ?></p>
	<p>ID: <?php echo($row["articleID"]); ?></p>
	<p>Title: <textarea name='title' cols="100"><?php echo($row["title"]); ?>"</textarea></p>
	<p>Author: <input type='text' name='author' value="<?php echo($row["author"]); ?>"/></p>
	<p>Preview: <textarea name='preview' cols="100" rows="5"><?php echo($row["preview"]); ?></textarea></p>
	<p>Content: <textarea name='content' cols="100" rows="20"><?php echo($row["content"]); ?></textarea></p>
	<p>Link: <textarea name='link' cols="100"><?php echo($row["link"]); ?></textarea></p>
	<p>Image: <textarea name='image'><?php echo($row["image"]); ?></textarea></p>


<?php //interface for confirm or cancel ?>
 <form action="confirm-delete.php" method="GET">
	<input type="hidden" value="<?php echo($row["id"]); ?>" name="id"/>
	<input type="submit"  value="Confirm" />
</form> 

<!-- <a href="confirm-delete.php?id=<?php echo($row['id']); ?>">confirm</a> -->