<?php

session_start();
$host="localhost";
$username="root";
$password="";
$db_name="forum"; // Database name
$tbl_name="posts"; // Table name

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($con, "forum")or die("cannot select DB");

?>

<!DOCTYPE HTML>
<HTML>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Student Forum</title> //temporary name is Air
  </head>

  <body>
    <header>
      <h1>AirTalk</h1>
    </header>

    <p2>Memes</p2>

    <?php
     $sql = "SELECT * FROM posts WHERE cat_id=1 ORDER BY likes DESC"; //cat_id is category id. 0 can be school, 1 is memes, 2 is sports 3 is tech 4 is politics. -just temporary
     $result = mysqli_query($con, $sql);
     $rank = 1;
    while($rows=mysqli_fetch_array($result))
    {

      echo $rank . '.';
      echo'<div class="memes">';
      echo $rows['creator'];
      echo $rows['datetime'];
      echo'<a href=' . $rows['image'] . '>';
      echo $rows['image'];
      echo'</a>';
      echo'<p>' . $rows['detail'] . '</p>'; //post desctiption
      echo $rows['likes'];
      $rank++;
      echo '<form method="POST">';
      echo '<input type="submit" name="like" value="Like">';
      if(isset($_POST['like']))
      {
        if($_SESSION['signed in']==true)
        {
          $likes=$rows['likes'];
          $likes++;
          $sql2 = "INSERT INTO posts (likes) VALUES($likes)";
          $result2 = mysqli_query($con, $sql2);
        }
        else
        {
          alert("Sign In First!");
          echo '<a href="signin.php">Sign In</a>';
        }
      }
      echo '</form>';
      echo '<a href="view_comments.php">Comments'. $rows['n_comments'] .'</a>'; //number of comments


    }

    ?>

    <a href="create_post.php">Create Post</a>

    <a href="tech.php"><img src=""></a>
    <a href="politics.php"><img src=""></a>
    <a href="school.php"><img src=""></a>
    <a href="region.php"><img src=""></a>

    <br/>

    <a href=signin.php>Sign In!</a>


    <br/><br/><br/>

    <p>Created by Abe, SungJae, and Ido</p>>
  </body>

</HTML>
