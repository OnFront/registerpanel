<?php
include('config/db_connection.php');


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$sql = "INSERT INTO users(name, email, password) VALUES ( '$username', '$password', '$email')";
mysqli_query($con, $sql);


if(isset($_POST['submit'])){
    Header('Location: success.php');
}

?>


<!DOCTYPE html>
<html>

    <?php include( 'templates/header.php' ); ?>


<div class="container d-flex">
    <div class="form-wrapper">
    
    
  <h2>It's time to register!</h2> 
  <form class="form" action="signup.php" method="POST">
      <div class="form-group">
          <label>Your Login:</label>
          <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($_POST['username']); ?>">
          <div class="invalid-feedback">Please provide Your Login</div>
      </div>
      <div class="form-group">
          <label>Your Password:</label>
          <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($_POST['password']); ?>">
          <div class="invalid-feedback">Please provide Your password</div>
      </div>
      <div class="form-group">
          <label>Your e-mail:</label>
          <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>"> 
          <div class="invalid-feedback">Please provide Your e-mail</div> 
      </div>              

      <a class="link" href="index.php"><button type="button" class="btn sec inform btn-sm position-relative" >Cancel</button></a>
      <a class="link" ><button type="submit" name="submit" class="btn prim inform btn-sm position-relative">Submit</button></a>
  </form>

    </div>
</div>      


        
<?php include( 'templates/footer.php' ); ?>
</html>


      

