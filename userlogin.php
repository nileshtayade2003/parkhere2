<?php
include "header.php";

// check user login credention #self submiting form
if(isset($_POST["submit"])){
    extract($_POST);
    $password=md5($password);
    $q="select * from users where email='$email' and password='$password'";
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)==1){
        $user=mysqli_fetch_array($result);
        $_SESSION['user']=$user;
        echo"<script>
             alert('Login Successful'); 
             window.location.href='user/user-home.php';
            </script>";
    }
    else
    {
        $_SESSION['msg']="Username or Password is Wrong.";
        echo "<script>
                 window.location.href='userlogin.php';
            </script>";
    }
}
?>

    <main>
        <form action="userlogin.php" method='post'>
            <h2>Users Login</h2>
            <?php
               if(isset($_SESSION["msg"])){
                echo "".$_SESSION["msg"]."";
                unset($_SESSION["msg"]);
               }
            ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name='submit'>Login</button>

            <a href="user-register.php" class="register-link">Don't have an account? Register here</a>
        </form>
    </main>

<?php
include "footer.php";
?>
