<div class="card" style="margin-top: 5px; margin-bottom: 5px;">
	<div class="card-body">
		<h5 class="card-title"><em><?php echo $row['author_username']; ?></em></h5>
		<p class="card-text"><?php echo $row['comment_text']; ?></p>
		<?php if (isset($_SESSION['user_username']) && $_SESSION['user_username'] == $row['author_username']) { ?>
			<a class="btn btn-outline-info btn-sm" href="../comments/edit.php?comment_id=<?php echo $row['id']; ?>&post_id=<?php echo $row['post_id'] ?>">Edit</a>
			<form id="deleteForm" action="../comments/delete.php?comment_id=<?php echo $row['id']; ?>&post_id=<?php echo $row['post_id'] ?>" method="post">
				<button name="submit" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
			</form>
		<?php } ?>
	</div>
</div>