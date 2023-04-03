<!DOCTYPE html>
<html>
<head>
    <title>G2Edu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login To G2Edu</h1>
    <?php
    $error = "";
    if(isset($_POST['submit'])) {
        // your login code
    }
    // PHP code for login page
    ?>
    <form method="post" action="admin page.php">
        <label>Username:</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</body>
</html>
