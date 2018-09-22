<div class="row">
	<div class="card" id="post_card">
		<div class="card-body">
			<h5 class="card-title"><?php echo $row["author_username"] ?></h5>
			<p class="card-text"><?php echo $row['post_text'] ?></p>
			<a href="show.php?post_id=<?php echo $row['id'] ?>" class="btn btn-info">View</a>
		</div>
	</div>
</div>