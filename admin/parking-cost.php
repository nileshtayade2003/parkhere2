<?php
include "header.php";

// updating parking cost
if(isset($_POST["submit"])){
    extract($_POST);
    $q= "update parking_cost set rate='$rate' where id='$id' ";
    $result=mysqli_query($conn,$q);
    if($result){
        echo "<script> alert(' Cost Successfully Updated.'); </script>";
    }
    else{
        echo "<script> alert(' Something Went Wrong.');  </script>";
    }
}

// select parking cost from database table named parking_cost
$q="select * from parking_cost";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_array($result);
?>
    <main>
        <h2>You can update the parking cost</h2>
        <form action="parking-cost.php" method="post">
            <label for="parkingCost">Parking Cost per Hour:</label>
            <input type="text" id="rate" name="rate" value="<?php echo $row['rate'] ?>" required>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
            <button type="submit" name='submit'>Update</button>
        </form>
    </main>
    
<?php
include "footer.php";
?>
