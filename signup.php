<?php
include('config/db_connection.php');

    //select all data from table USERS
    $sql = 'SELECT id, name, email, password FROM users ORDER BY created_at';
    //sending query to the table USERS
    $result = mysqli_query($con, $sql);
    //displaying results from the table
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$email = $_POST['email'];



$error = array(
    'name' => '',
    'password' => '',
    'email' => ''
);

if(isset($_POST['submit'])){
    
    //check name
    if(empty($username)){
        echo 'A name is required <br />';
    } else {
    
        if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
            $error['name'] = 'name must be a letters and spaces only';
        }
    }

    //check email
    if(empty($email)){
        echo 'An e-mail is required <br />';
        } else { 
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'an E-mail must be a valid e-mail address';
            }


             //checks if email is taken
        
            $sql2 = "SELECT * FROM users WHERE email = '$email'";
            $result2 = mysqli_query($con, $sql2);
            $checked_email = mysqli_fetch_row($result2);
           
            if(mysqli_num_rows($result2) > 0){
                $error['email'] = 'Sorry, this email is already taken.';
            }
 
            mysqli_free_result($result2);
            
        }

  
    }


    //check password
    if(empty($password)){
         echo 'A password is required <br />';
    } else {
        if(!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)){
            $error['password'] = 'Password has to contain at least 8 characters, at least one uppercase and lowercase letter, at least one number';
        }
    }

    if(array_filter($error)){
        echo 'errors in the form';
    } else {
        
        $sql = "INSERT INTO users(name, email, password) VALUES ( '$username', '$email', '$hashed_password')";
      

       if(mysqli_query($con, $sql)){
           header('Location: success.php');
       }
    } //end of POST check 
     
 

  
    
    
    

mysqli_close($con);

?>


<!DOCTYPE html>
<html>

    <?php include( 'templates/header.php' ); ?>


<div class="container d-flex">
    <div class="form-wrapper">
    
    
  <h2>It's time to register!</h2> 
  <form class="form" action="signup.php" method="POST">
      <div class="form-group">
          <label>Your Name</label>
          <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($_POST['username']); ?>">
          <div class="invalid-feedback">Please provide Your Login</div>
          <div class="text-danger"><?php echo $error['name'] ;?></div>
      </div>
      <div class="form-group">
          <label>Your e-mail:</label>
          <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>"> 
          <div class="invalid-feedback">Please provide Your e-mail</div> 
          <div class="text-danger"><?php echo $error['email'] ;?></div>
      </div>   
      <div class="form-group">
          <label>Your Password:</label>
          <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($_POST['password']); ?>">
          <div class="invalid-feedback">Please provide Your password</div>
          <div class="text-danger"><?php echo $error['password'] ;?></div>
      </div>
              

      <a class="link" href="index.php"><button type="button" class="btn sec inform btn-sm position-relative" >Cancel</button></a>
      <a class="link" ><button type="submit" name="submit" class="btn prim inform btn-sm position-relative">Submit</button></a>
  </form>

    </div>
</div>      


        
<?php include( 'templates/footer.php' ); ?>
</html>


      

