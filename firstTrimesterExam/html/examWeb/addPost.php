<!-- Form to add posts
Input data 
All fields required
Select list of TOPICS and USERS: Must show name/description and store id -->
<?php 
include_once("./myPhp/initialPhp.php");

//test data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
$nameErr= $postErr= $topicErr= $post= $name= $topic= "";
  //require data and upload
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }
  
    if (empty($_POST["post"])) {
      $postErr = "<b>Post is required!</b>";
    } else {
      $post = test_input($_POST["post"]);
    }
  
    if (empty($_POST["submitTopic"])) {
      $topicErr = "Topic is required";
    } else {
      $finalTopic = test_input($_POST["submitTopic"]);
    }

    // $oper->addPost(new Post($post, $finalTopic, new Usuario($name)));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new post</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php 
        include_once("./myPhp/header.php");
    ?>
    <div id="formDiv">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="post">Your Post:</label>
        <input type="text" name="post" id="post">


        <label for="topic">Pick a topic:</label>
        <select name="submitTopic" id="submitTopic">
            <?php
                $topics= $oper->getAllTopics();
                foreach($topics as $topic){
                    echo "<option value='{$topic["description"]}}'>{$topic["description"]}</option>";
                }
            ?>
        </select>


        <label for="topic">Pick a name:</label>
        <select name="name" id="name">
            <?php
                $usuarios= $oper->getAllUsuarios();
                foreach($usuarios as $usuario){
                    echo "<option value='{$usuario["name"]}}'>{$usuario["name"]}</option>";
                }
            ?>
        </select>


        <input type="submit" value="Add!">
    </form>
</div>
    <?php 
        echo $nameErr;
        echo $postErr;
        echo $topicErr;
    ?>
    <?php
        require_once("./myPhp/footer.php");
    ?>
</body>
</html>