<!DOCTYPE html>
<!-- monggo front end na -->
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../process/process_login.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
