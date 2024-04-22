<?php
include "header.php";

// signup user (insert record into users table)
if(isset($_POST["submit"])){
    extract($_POST);
    $password=md5($password);
    $q="insert into users (name,email,dob,gender,phone,address,password) values('$name','$email','$dob','$gender','$phone','$address','$password')";
    $result=mysqli_query($conn, $q);
    if($result){
        echo"<script>
             alert('Registration Successful'); 
             window.location.href='userlogin.php';
            </script>";
    }
    else
    {
        $_SESSION['msg']='Something went wrong , Please try again...';
        echo "<script>
                 window.location.href='user-register.php';
            </script>";
    }
}
?>
    <main>
        <form action="user-register.php" method="post">
            <h2>Users Registration</h2>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone"  placeholder="123-456-7890" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name='submit'>Register</button>

            <a href="userlogin.php" class="register-link">Already have an account? Login here</a>
        </form>
    </main>

<?Php
include "footer.php";
?>
