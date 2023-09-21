<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    ?>



    Welcome, <?php echo $_POST["username"]; ?> <br /> <br />
    Your role is: <?php echo $_POST["role"]; ?> <br /> <br />
    You speak: <?php
                if (isset($_POST["language"])) {
                    echo implode(", ", $_POST["language"]);
                } else {
                    echo "No languages selected.";
                };
                ?>
</body>

</html>