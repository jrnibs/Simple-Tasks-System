<?php 
session_start();
include '../model/user.php';
$user = new User();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($user->login($username,$password)){
            $_SESSION['user_id'] = $user->getUserId($username,$password);
            header('location: ../view/home.php');
            exit();
        }else {
            header('location: ../index.php?error=Invalid username or password');
            exit();
        }
    }

    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = 1;

        if($user->addUser($fname,$lname,$username,$password,$address, $email, $status)){
            header('location: ../index.php?success=Registration successful');
            exit();
        }else {
            header('location: ../index.php?error=Registration failed');
            exit();
        }
    }
}

?>