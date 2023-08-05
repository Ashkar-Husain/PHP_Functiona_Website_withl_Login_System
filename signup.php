<?php
include 'header.php';
?>
<div class="formContainer">
<?php
    include 'config.php';
    if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $date = date('Y-m-d H:m:s');
    $sql = "INSERT INTO `users` (`username`,`email`,`password`,`date`) VALUES ('$username','$email','$password','$date')";
    $result = mysqli_query($conn,$sql) or die("Query Failed");    
    header('Location:http://localhost/beg_log/login.php');
    connection_close($conn);   
    }      
?>
    <form action="#" method="post">
        <h2>Signup Page</h2>
        <div class="field">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password"id="password" required>
        </div>
        <button name="signup">Signup</button>
    </form>
</div>
