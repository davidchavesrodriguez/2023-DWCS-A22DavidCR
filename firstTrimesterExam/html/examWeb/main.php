<!-- 
List of posts
Shows: contents, topic description, username 
-->
<?php 
include_once("./myPhp/initialPhp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Posts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include_once("./myPhp/header.php");
    ?>

<div id="postDiv">
<?php 
$posts= $oper->getAllPosts();
foreach ($posts as $post) {
    echo "<div class='post'>";
    echo "{$post["contents"]}";
    echo "</div> <br>";
}
?>
</div>

<a href="addPost.php">Do you want to add a new item?</a>

    <?php
        require_once("./myPhp/footer.php");
    ?>
</body>
</html>