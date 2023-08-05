<?php
include 'header.php';
?>
<div class="formContainer">
<?php
    include 'config.php';
    if(isset($_POST['login'])){    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);    
    $sql = "SELECT * FROM `users` where `email` = '$email' && `password`='$password' limit 1";
    $result = mysqli_query($conn,$sql) or die("Query Failed");    
    if(mysqli_num_rows($result) >0 ){
        $row = mysqli_fetch_assoc($result);        
        // print_r($row);       
               
        $_SESSION['userData'] = $row;     
        header('Location:http://localhost/beg_log/profile.php');
        connection_close($conn); 
        }else{
            echo "<div style='text-align:center;color:red; position:relative; top:45px'>Wrong Email or Password.</div>";
        }
    }
         
?>
    <form action="#" method="post">
        <h2>Login Page</h2>        
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password"id="password" required>
        </div>
        <button name="login">Login</button>
    </form>
    
</div>