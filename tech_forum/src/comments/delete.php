<?php
session_start();
include '../../config/config.php';

if (!isset($_POST['submit']) || !isset($_GET['comment_id']) || !isset($_GET['post_id'])) {
	echo "error, page not found";
} else {
	$comment_id = $_GET['comment_id'];
	$post_id = $_GET['post_id'];

	$sql = "DELETE FROM comments WHERE id = '$comment_id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../posts/show.php?post_id=$post_id");
		exit();
	} else {
		echo "unknown error";
	}
}