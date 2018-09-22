<?php
session_start();
include '../../config/config.php';

if (!isset($_POST['submit']) || !isset($_GET['post_id']) || !isset($_SESSION['user_id']) ) {
	echo "error, please try again later";
} else {
	$id = $_GET['post_id'];
	$sql = "DELETE FROM posts WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: index.php");
	} else {
		echo "unknown error";
	}
}