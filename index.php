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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



     