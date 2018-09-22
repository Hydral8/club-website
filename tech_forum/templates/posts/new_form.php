<div style="margin-top: 20px;" class="jumbotron">
	<h1>Talk Tech !</h1>
	<?php if (isset($_SESSION['user_id'])) { ?>
		<form action="new.php" method="post" id="bottom-sticky">
			<textarea name="text" id="post_input" placeholder="Type your message..."></textarea>
			<button name="submit" id="post_btn" type="submit" class="btn btn-primary">Post</button>
		</form>
	<?php } ?>
</div>