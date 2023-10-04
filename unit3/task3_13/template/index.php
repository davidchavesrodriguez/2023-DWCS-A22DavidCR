<!DOCTYPE html>
<html lang="es">

<!-- "require" should be used for important data that cannot be missing in the destination. Not being there will cause a fatal error. "include" will be used fot additional info, making it produce only a warning if the data is miising-->

<head>
    <meta charset="utf-8">
    <title>Web Portal - Includes and requires</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    <div id="header" class="container">
        <?php require "logo.php" ?>
        <?php require "menu.php" ?>
    </div>
    <?php require "pictures.php" ?>
    <div id="page">
        <div id="bg1">
            <div id="bg2">
                <div id="bg3">
                    <?php require "content.php" ?>
                    <?php require "sidebar.php" ?>
                </div>
            </div>

        </div>
    </div>
    <?php require "footer.php" ?>
</body>

</html>