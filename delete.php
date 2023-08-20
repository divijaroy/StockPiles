 <?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/24/2014
 * Time: 11:55 PM
 */
// include("database/db_conection.php");
// $delete_id=$_GET['del'];
// $delete_query="delete  from employees WHERE emp_no='$delete_id'";//delete query
// $run=mysqli_query($dbcon,$delete_query);
// if($run)
// {
//javascript function to open in the same window
//     echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";
// }

include("database/db_conection");
$delete_id = $_GET['del'];

// First, get the admin ID you want to use as the foreign key
$admin_id = "admin123"; // Replace this with the actual admin ID

// Update the supplier records with the new admin ID where the emp_no matches
$update_query = "UPDATE supplier SET emp_no='$admin_id' WHERE emp_no='$delete_id'";
$run_update = mysqli_query($dbcon, $update_query);

if ($run_update) {
    // Now you can delete the employee record
    $delete_query = "DELETE FROM employees WHERE emp_no='$delete_id'";
    $run_delete = mysqli_query($dbcon, $delete_query);

    if ($run_delete) {
        echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";
    } else {
        echo "Error deleting employee record: " . mysqli_error($dbcon);
    }
} else {
    echo "Error updating supplier records: " . mysqli_error($dbcon);
}


?>
