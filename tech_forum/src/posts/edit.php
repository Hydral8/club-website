<?php
include '../../config/config.php';
include '../../templates/partials/header.php';

if (!isset($_GET['post_id']) || !isset($_SESSION['user_id'])) {
	echo "error";
} else if (isset($_POST['submit'])) {
	$id = $_GET['post_id'];
	$text = mysqli_real_escape_string($conn, $_POST['text']);

	$sql = "UPDATE posts SET post_text = '$text' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: show.php?post_id=$id");
	} else {
		echo "error, please try again later";
	}
} else {
	$id = $_GET['post_id'];

	$sql = "SELECT * FROM posts WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		$row = mysqli_fetch_assoc($result);

		if ($row['author_username'] != $_SESSION['user_username']) {
			echo "error, you are not authorized to do this";
		} else {
			include '../../templates/posts/edit_form.php';
		}
	}
}



include '../../templates/partials/footer.php';