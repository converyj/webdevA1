<?php 
session_start(); 

//  process contact info to table
if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['role'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$role = $_POST['role'];
} else {
	header("Location: contact.html");
}
$userID = $_SESSION['userID'];

	$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
	$dbusername = "converyj";
	$dbpassword = "HUgT86Fga#97";

	$pdo = new PDO($dsn, $dbusername, $dbpassword);  

if (!empty($_POST["category"])) {
	foreach ($_POST["category"] as $checkbox) {
		echo($checkbox);
		if ($checkbox == "industry") {
			$int1 = "Y"; 
		} else {
			$int1 = "N"; 
		}
		if ($checkbox == "technical") {
			$int2 = "Y"; 
		} else {
			$int2 = "N"; 
		}
		if ($checkbox == "career") {
			$int3 = "Y"; 
		} else {
			$int3 = "N"; 
		}
	}
} else {
	$int1 = "N"; 
	$int2 = "N"; 
	$int3 = "N"; 
}
echo("before insert");
$stmt = $pdo->prepare("
					INSERT INTO `contact`
					VALUES ('$userID', '$firstName', '$lastName', '$email', '$int1', '$int2', '$int3', '$role'); ");

$stmt->execute();
echo("after insert");



//header("Location: logout.php");
 ?>