<?php
include '../../config/config.php';
include '../../templates/partials/header.php';

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 1) {
		header("Location: login.php?error=Username+Is+Incorrect");
	} else {
		$row = mysqli_fetch_assoc($result);

		if (password_verify($pwd, $row['pwd'])) {
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_username'] = $row['username'];

			header("Location: ../posts/index.php");
			exit();
		} else {
			header("Location: login.php?error=Password+Is+Incorrect");
			exit();
		}
	}
} else if (isset($_GET['error'])) {
	include '../../templates/index/error.php';
}

include '../../templates/auth/login_form.php';
include '../../templates/partials/footer.php';