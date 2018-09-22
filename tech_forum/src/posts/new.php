<?php
session_start();
include '../../config/config.php';

if (isset($_POST['submit']) && isset($_SESSION['user_username'])) {
	$username = $_SESSION['user_username'];
	$text = mysqli_real_escape_string($conn, $_POST['text']);

	$sql = "INSERT INTO posts (author_username, post_text) VALUES ('$username', '$text')";

	if (mysqli_query($conn, $sql)) {
		header("Location: index.php");
		exit();
	} else {
		echo "errorr";
	}
} else {
	echo "error, please try again";
}