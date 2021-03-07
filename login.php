<?php
   
include('config/db_connection.php');

$email = mysqli_real_escape_string($con, $_POST['login-email']);
$password = mysqli_real_escape_string($con, $_POST['login-pass']);

$name = mysqli_real_escape_string($con, $_POST['login-name']);

$sql =  "SELECT * FROM users WHERE name = '$name' ";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_row($result);


if(isset($_POST[ 'login-submit' ])){

//checks if user exists 

  if(mysqli_num_rows($result) > 0){
  
    //and then checks its password
    if(password_verify($password, $user[3])){
      
    } else {
      $error['password'] = 'Wrong password.';
    }
  
    } else {
      $error['name'] = 'User does not exist';
    }
  }


mysqli_free_result($result);
mysqli_close($con);


?>


<!DOCTYPE html>
<html>

<?php include( 'templates/header.php' ); ?>

<div class="login-form-wrapper">
        
        
    <h2>Login</h2> 
   
        <form action="login.php" class="px-4 py-3" method="POST">
          <div class="mb-3">
            <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="login-name"  placeholder="Your e-mail" value="<?php echo htmlspecialchars($name) ?>">
            <div class="text-danger"><?php echo $error['name'] ;?></div>
          </div>
          <div class="mb-3">
            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="login-pass"  placeholder="Password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="text-danger"><?php echo $error['password'] ;?></div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="dropdownCheck">
              <label class="form-check-label" for="dropdownCheck">
                Remember me
              </label>
            </div>
          </div>
          <input type="submit" name="login-submit" value="submit" class="btn btn-primary" id="login-submit">
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">New around here? Sign up</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
    
</div>
</body>
</html>