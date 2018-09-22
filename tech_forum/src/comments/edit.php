<?php
include '../../config/config.php';
include '../../templates/partials/header.php';

if (!isset($_SESSION['user_username']) || !isset($_GET['comment_id']) || !isset($_GET['post_id'])) {
	echo "error, page not found";
} else if (isset($_POST['submit'])) {
	$id = $_GET['comment_id'];
	$text = mysqli_real_escape_string($conn, $_POST['text']);
	$post_id = $_GET['post_id'];

	$sql = "UPDATE comments SET comment_text = '$text' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../posts/show.php?post_id=$post_id");
	} else {
		echo "error, could not update";
	}
} else {
	$id = $_GET['comment_id'];

	$sql = "SELECT * FROM comments WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		$row = mysqli_fetch_assoc($result);

		if ($row['author_username'] != $_SESSION['user_username']) {
			echo "error, you must be the author of the comment to do this";
		} else {
			include '../../templates/comments/edit_form.php';
		}
	}
}

include '../../templates/partials/footer.php';