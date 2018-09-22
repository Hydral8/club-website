<?php
include '../../config/config.php';
include '../../templates/partials/header.php';
include '../../templates/posts/new_form.php';

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		include '../../templates/posts/thumbnail.php';
	}
}

include '../../templates/partials/footer.php';