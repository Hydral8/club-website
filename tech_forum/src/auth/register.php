<?php
include '../../config/config.php';
include '../../templates/partials/header.php';

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		header("Location: register.php?error=Username+Is+Already+Taken");
	} else {
		// Hash the password for safety
		$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (username, pwd) VALUES ('$username', '$hashed_pwd')";

		if (mysqli_query($conn, $sql)) {
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) == 1) {
				// Store the user's data in the session
				$row = mysqli_fetch_assoc($result);
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_username'] = $row['username'];

				header("Location: ../posts/index.php");
			} else {
				header("Location: register.php?error=Unknown+Error.+Please+Try+Again+Later");
			} 
		} else {
			header("Location: register.php?error=Unknown+Error.+Please+Try+Again+Later");
		}
	}
} else if (isset($_GET['error'])) {
	include '../../templates/index/error.php';
}

include '../../templates/auth/register_form.php';
include '../../templates/partials/footer.php';