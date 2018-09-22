<div class="row">
    <div id="basicForm">
        <form action="edit.php?comment_id=<?php echo $row['id']; ?>&post_id=<?php echo $row['post_id'] ?>" method="post">
        	<h2 class="text-center">Edit Comment</h2>
            <div class="form-group">
                <textarea name="text" placeholder="Text: " class="form-control" style="height: 200px;"><?php echo $row['comment_text']; ?></textarea>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
        <a href="../posts/show.php?post_id=<?php echo $row['post_id']; ?>" class="btn btn-light">Back</a>
    </div>
</div>