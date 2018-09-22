<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_GET['post_id']) || !isset($_SESSION['user_id'])) {
	echo "error";
} else if (isset($_POST['submit'])) {
	$text = mysqli_real_escape_string($conn, $_POST['text']);
	$id = $_GET['post_id'];
	$username = $_SESSION['user_username'];

	$sql = "INSERT INTO comments (post_id, comment_text, author_username) VALUES ('$id', '$text', '$username')";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../posts/show.php?post_id=$id");
		exit();
	} else {
		echo "error please try again" . mysqli_error($conn);
	}
} else {
	$id = $_GET['post_id'];

	$sql = "SELECT * FROM posts WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error";
	} else {
		$row = mysqli_fetch_assoc($result);
		include '../../templates/comments/new_form.php';
	}
}


include '../../templates/partials/footer.php';