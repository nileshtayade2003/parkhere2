<?php
include "header.php";

// login code #self submiting form
if (isset($_POST['submit']))
{
    extract($_POST);
    $password = md5($password);
    $q="select * from admin where name='$name' and password='$password'";
    $result=mysqli_query($conn,$q);
   
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['admin']=$row;
        echo"<script>
             alert('Login Successful'); 
             window.location.href='admin/admin-home.php';
            </script>";
    }
    else
    {
        $_SESSION["msg"]= "Username or Password is Wrong";
        echo "<script>
                window.location.href='admin-login.php';
              </script>";
    }
}

?>
    <main>
        <form action="admin-login.php" method="post">
            <h2>Administrator Login</h2>
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name='submit'>Login</button>
        </form>
    </main>

<?php
include "footer.php";
?>