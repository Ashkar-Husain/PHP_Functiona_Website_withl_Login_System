<?php
include 'config.php';
include 'header.php';
if(empty($_SESSION['userData'])){
    header('Location:http://localhost/beg_log/login.php');
    connection_close($conn);    
}
?>
<div class="container">
    <div class="profile">
<?php
if(isset($_POST['save'])){
    // $file = $_FILES['file'];
    $image_added = false;
    if(!empty($_FILES['image']['name']) && $_FILES['image']['error']==0){
        $folder = 'uploads/';
        if(!file_exists($folder)){
            mkdir($folder,0777,true);
        }
        $image = $folder . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $image_added = true;
    }
    // die();
    $username = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 
    $id = $_SESSION['userData']['id'];
    if($image_added == true){
    $sql = "UPDATE  `users`  SET `username` = '$username',`email` = '$email',`password` = '$password',
    `image` = '$image' WHERE `id` = {$id} limit 1";
    }else{
        $sql = "UPDATE  `users`  SET `username` = '$username',`email` = '$email',`password` = '$password'
        WHERE `id` = {$id} limit 1";
    }
    $result = mysqli_query($conn,$sql) or die("Query Failed");   
    $sql = "SELECT * FROM `users` WHERE `id` = {$id}";
    $result = mysqli_query($conn,$sql) or die("Query Failed"); 
    if(mysqli_num_rows($result)>0){
        $_SESSION['userData'] = mysqli_fetch_assoc($result);
    header('Location:http://localhost/beg_log/profile.php');
    connection_close($conn); 

    }      
    }      
if(!empty($_GET['action']) && $_GET['action'] == 'edit'):
?>
        <!-- <h2>User Profile</h2> -->
<div class="formContainer">
<form action="#" method="post" enctype="multipart/form-data">
        <h2>Edit Profile</h2>
        <div class="field">
            <img src="<?php echo $_SESSION['userData']['image']; ?>">
            <label for="file">Change Image</label>
            <input type="file" name="image" id="file">
        </div>
        <div class="field">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" value="<?php echo $_SESSION['userData']['username']?>">
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['userData']['email']?>">
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password"id="password" value="<?php echo $_SESSION['userData']['password']?>">
        </div>
        <div class="field">           
            <input type="hidden" name="action" value="EditProfile">
        </div>
        <div class="btn">
        <a href="profile.php">
        <button type='button'>cancel</button>
        </a>
        <button name='save' style='background-color:green;'>Save</button>
        </div>
    </form>
    </div>
<?php else: ?>
    <table>    
        <tr>
            <td><img src="<?php echo $_SESSION['userData']['image']; ?>"></td>
        </tr> 
        <tr>          
            <td><?php echo $_SESSION['userData']['username'] ?></td>       
        </tr> 
            <tr><td><?php echo $_SESSION['userData']['email'] ?></td>            
        </tr> 
        <tr>
            
            <td><a href="profile.php?action=edit"><button>Edit Profile</button></a></td>
            
        </tr>           
    </table> 
    <form action="#"method="post">
        <textarea name="" placeholder="#Comment..."></textarea>
        <button>Post</button>
    </form> 
    <?php endif; ?>  
    </div>
</div>