<div class="row" style="margin-top: 20px;">
	<div class="card" id="post_card">
		<div class="card-body">
			<h5 class="card-title"><?php echo $row["author_username"] ?></h5>
			<p class="card-text"><?php echo $row['post_text'] ?></p>
			<?php if (isset($_SESSION['user_id'])) { ?>
				<a id="showBtn" href="../comments/new.php?post_id=<?php echo $row['id'] ?>" class="btn btn-primary">Comment</a>
			<?php } ?>
			<?php if ($row['author_username'] == $_SESSION['user_username']) { ?>
				<a id="showBtn" href="edit.php?post_id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a>
				<form id="showDeleteForm" action="delete.php?post_id=<?php echo $row['id']; ?>" method="post">
					<button name="submit" type="submit" class="btn btn-danger">Delete</button>
				</form>
			<?php } ?>
		</div>
	</div>
</div>