<!-- CREATE TABLE login 
(userId INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255), password VARCHAR(255));

INSERT INTO login 
(username, password) 
VALUES 
('A22DavidCR', 'abc123.'),
('A22JulioAA', 'abc123.'),
('A22IsamelLF', 'abc123.'); -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Welcome!</h1>
    <form action="login.php" method="post">
        <label for="userName">Username</label>
        <input type="text" name="username" />
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" />
        <br><br>
        <input type="submit" name="submit" />
    </form>
</body>

</html>