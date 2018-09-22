<div class="row">
    <div id="basicForm">
        <form action="new.php?post_id=<?php echo $row['id']; ?>" method="post">
        	<h2 class="text-center">Comment On <?php echo $row['author_username'] ?>'s Post</h2>
            <div class="form-group">
                <textarea name="text" placeholder="Text: " class="form-control" style="height: 200px;"></textarea>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
        <a href="../posts/show.php?post_id=<?php echo $row['id']; ?>" class="btn btn-light">Back</a>
    </div>
</div>