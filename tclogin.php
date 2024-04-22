<?php
include "header.php";

// check login credentials #self submiting form
if(isset($_POST["submit"])){
    extract($_POST);
    $password = md5($password);
    $q="select * from ticket_checker where name='$name' and password='$password'";
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        $_SESSION['tc']= $row;
        echo"<script>
             alert('Login Successful'); 
             window.location.href='tc/tc-home.php';
            </script>";
       
    }
    else{
        $_SESSION['msg']='Username or Password is Wrong';
        echo "<script>
                window.location.href='tclogin.php';
            </script>";
    }
}
?>
    <main>
        <form action="tclogin.php" method="post">
            <h2>Ticket Checker Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name='submit'>Login</button>
        </form>
    </main>
<?php
include "footer.php";
?>