<?php
include('config/db_connection.php');

    //select all data from table USERS
    $sql = 'SELECT id, name, email, password FROM users ORDER BY created_at';
    //sending query to the table USERS
    $result = mysqli_query($con, $sql);
    //displaying results from the table
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($con);





?>


<!DOCTYPE html>
<html>
<?php include( 'templates/header.php' ); ?>





    <div class="container">
   

        <h1>Main Page</h1>
        <p>It'a me, Mario!</p>
        
    </div>

        
    <?php include( 'templates/footer.php' ); ?>
</html>




     