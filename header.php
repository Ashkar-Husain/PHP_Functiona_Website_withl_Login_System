<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="welcome.php">Home</a>
            <a href="profile.php">Profile</a>
             <?php if(empty($_SESSION['userData'])): ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
            <?php else: ?>
            <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>    
</body>
</html>