<?php 

include '../model/user.php';
$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['edit'])) {
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $adddress = $_POST['adddress'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        if($user->updateUser($user_id, $fname, $lname, $username, $password, $adddress, $email, $status)) {
            echo "<script>alert('User updated successfully');</script>";
            header('location: ../view/list_user.php');
            exit();
        } else {
            echo "<script>alert('Failed to update user');</script>";
            header('location: ../view/list_user.php');
            exit();
        }
    }elseif(isset($_POST['add'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $adddress = $_POST['adddress'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        if($user->addUser($fname, $lname, $username, $password, $adddress, $email, $status)) {
            echo "<script>alert('User added successfully');</script>";
            header('location: ../view/list_user.php');
            exit();
        } else {
            echo "<script>alert('User added successfully');</script>";
            header('location: ../view/list_user.php');
            exit();
        }
    }
} elseif( $_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['delete'])){
        $user_id = $_GET['delete'];
        if($user->deleteUser($user_id)) {
            echo "<script>alert('User deleted successfully');</script>";
            header('location: ../view/list_user.php');
            exit();
        } else {
            echo "<script>alert('Failed to delete user');</script>";
            header('location: ../view/list_user.php');
            exit();
        }
    } 
} 

?>