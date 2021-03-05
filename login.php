<?php
   
include('config/db_connection.php');

$email = $_POST['login-email'];
$password = $_POST['login-pass'];
$name = $_POST['login-name'];

$sql =  "SELECT * FROM users WHERE name = '$name' ";
$result = mysqli_query($con, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);




if(isset($_POST[ 'login-submit' ])){


//checks if user exists and then checks its password
 foreach($users as $user){

     if($user['name'] == true){
       print_r($user['name'] . ' ' . 'FUCKING EXISTS!!!');
     } 

     if($user['password'] === $password){
       print_r('prawidlowe haslo');
     } else {
       print_r('złe hasło!');
     }
  }
  
    //checks if user doesnt exists
    if(mysqli_num_rows($result) == 0){
      echo 'nie istnieje';
  }

};


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
            <input type="text" class="form-control" name="login-name"  placeholder="Your e-mail" value="<?php echo $name ?>">
            
          </div>
          <div class="mb-3">
            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="login-pass"  placeholder="Password" value="<?php echo $password ?>">
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