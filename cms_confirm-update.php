<?php 

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$preview = $_POST['preview'];
$content = $_POST['content'];
$link = $_POST['link'];
$image = $_POST['image'];

/*execute update*/
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 

$stmt = $pdo->prepare("
						UPDATE `article` 
						SET `title` = '$title', 
						`author` = '$author', 
						`preview` = '$preview', 
						`content` = '$content', 
						`link` = '$link', 
						`image` = '$image' 
						WHERE `article`.`articleID` = '$id';");

$i = $stmt->execute();
if($i == 1 ) {
	header("Location: cms_menu.php"); 
} else {
	echo("Update failed");
}


?>