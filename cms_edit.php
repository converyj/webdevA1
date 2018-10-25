<?php 

/* select data from one row in a database and display them in editable fields */

/* receive a record id*/
//myapp.com/edit.php?id=5
$id = $_GET['id'];

/* query database and retrieve recotd info based on the id*/
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

$stmt = $pdo->prepare("
						SELECT * FROM `article` 
						WHERE `article`.`articleID` = '$id'");

$stmt->execute();

$row = $stmt->fetch();

/* display data in editable fields of an update form*/
// FIX -no <p> in form tag like cms_delete 
?>
<h1>Update record</h1>
<form action="cms_confirm-update.php" method="POST">  
	
	<p>Category: <?php echo($row["category"]); ?></p>
	<p>ID: <?php echo($row["articleID"]); ?></p>
	<input type="hidden" value="<?php echo($row["articleID"]); ?>" name="id"/>
	<p>Title: <textarea name='title' cols="100"><?php echo($row["title"]); ?>"</textarea></p>
	<p>Author: <input type='text' name='author' value="<?php echo($row["author"]); ?>"/></p>
	<p>Preview: <textarea name='preview' cols="100" rows="5"><?php echo($row["preview"]); ?></textarea></p>
	<p>Content: <textarea name='content' cols="100" rows="20"><?php echo($row["content"]); ?></textarea></p>
	<p>Link: <textarea name='link' cols="100"><?php echo($row["link"]); ?></textarea></p>
	<p>Image: <textarea name='image'><?php echo($row["image"]); ?></textarea></p>
	<input type='submit'/> 
</form>