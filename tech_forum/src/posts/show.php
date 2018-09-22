<?php
include '../../config/config.php';
include '../../templates/partials/header.php';


if (!isset($_GET['post_id'])) {
	echo "error, page not found";
} else {
	$id = $_GET['post_id'];

	$sql = "SELECT * FROM posts WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		echo "error, page not found";
	} else {
		$row = mysqli_fetch_assoc($result);
		include '../../templates/posts/show.php';

		$sql = "SELECT * FROM comments WHERE post_id = $id ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			include '../../templates/comments/header.php';

			while ($row = mysqli_fetch_assoc($result)) {
				include '../../templates/comments/thumbnail.php';
			}

			include '../../templates/comments/footer.php';
		}
	}
}


include '../../templates/partials/footer.php';