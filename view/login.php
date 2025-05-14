<?php 
session_start();
if(isset($_SESSION['user_id'])){
    header('location: view/home.php');
    exit();
}

if (!defined('APP_STARTED')) {
    http_response_code(403);
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <?php include 'includes/href.php'; ?>
    <style>
    body.img-bg-login {
        background-image: url('assets/img/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .card {
        background-color: rgba(197, 48, 177, 0.75);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    }

    .btn {
        background-color: #f6d4b2;
        color: #000;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 10px;
    }
    .btn:hover {
        background-color: #f6b2a1;
    }

    h1 {
        color: #f6d4b2;
        text-align: center;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.5s ease-in-out;
    }
    </style>
</head>
<body class="img-bg-login">
    <div class="container-fluid" >
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-3 col-sm-12">
                <div class="card border-primary">
                    <div class="card-body p-5">
                    <h1 class="text-center">LOGIN</h1>
                    <?php
                        if(isset($_GET['error'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $_GET['error']; ?>        
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?> 
                        <form action="controller/auth.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="password" class="form-control" id="floatingInput" placeholder="">
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class="form-group my-2 text-center">
                                <button type="submit" name="login" class="btn btn-primary">Submit</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
</body>
</html>