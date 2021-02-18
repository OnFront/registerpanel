<?php
   
include('config/db_connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");

$row = mysqli_fetch_array($sql);


if(is_array($row)){
    //user exists
    header('Location: success.php');

} else {
    print_r('User doesnt exist');
}


mysqli_close($con);


?>


<!DOCTYPE html>
<html>

<?php include( 'templates/header.php' ); ?>


    <div class="container d-flex">
        <div class="form-wrapper">
        
        
    <h2>Login</h2> 
    <form class="form" action="login.php" method="POST">
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>"> 
            <div class="invalid-feedback">Please provide Your e-mail</div> 
        </div>      
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($_POST['password']); ?>">
            <div class="invalid-feedback">Please provide Your password</div>
        </div>

        <a class="link" href="index.php"><button type="button" class="btn sec inform btn-sm position-relative" >Cancel</button></a>
        <a class="link" ><button type="submit" name="submit" class="btn prim inform btn-sm position-relative">Login</button></a>
    </form>

        </div>
    </div>      


       
<?php include( 'templates/footer.php' ); ?>
</html>