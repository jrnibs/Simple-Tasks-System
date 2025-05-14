<?php 
include '../controller/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <?php include '../includes/href.php'; ?>

    <style>
    body {
        background-color: #fdf6e3;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    </style>

</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container-fluid">
        <div class="row mt-4">
            <h2>VIEW USERS</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_GET['edit'])) { 
                    $user_id = $_GET['edit'];
                    $row = $user->getUserById($user_id);

                    if($row) { ?>
                <div class="card border-primary">
                    <div class="card-header">
                        <h3>EDIT USER</h3>
                    </div>
                    <div class="card-body">
                        <form action="../controller/action_user.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <div class="form-group my-2">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required>
                            </div>  
                            <div class="form-group my-2">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="adddress">Address</label>
                                <input type="text" name="adddress" class="form-control" value="<?php echo $row['address']; ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="status">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="1" <?php if($row['active'] == 1){echo 'selected';} ?>>Active</option>
                                    <option value="0" <?php if($row['active'] == 0){echo 'selected';} ?>>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group py-3">
                                <button type="submit" name="edit" class="btn btn-primary">Edit User</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='list_user.php'">Cancel</button>
                            </div>
                    </div>
                </div>
                <?php } } else { ?>
                <div class="card border-primary">
                    <div class="card-header">
                        <h3>ADD USER</h3>
                    </div>
                    <div class="card-body">
                        <form action="../controller/action_user.php" method="POST">
                            <div class="form-group my-2">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" required>
                            </div>  
                            <div class="form-group my-2">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="adddress">Address</label>
                                <input type="text" name="adddress" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="status">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                           
                            <div class="form-group py-3">
                                <button type="submit" name="add" class="btn btn-primary">Add User</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='list_user.php'">Cancel</button>
                            </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-header">
                        <h3>USER LIST</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $users = $user->getAllUsers();
                                $count = 1;
                                foreach($users as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo ($row['active'] == 1) ? '<span class="badge rounded-pill bg-success">Active</span>' 
                                    : '<span class="badge rounded-pill bg-secondary">Deactived</span>'; ?></td>
                                    <td><?php echo $row['date_created']; ?></td>
                                    <td>
                                        <a href="list_user.php?edit=<?php echo $row['user_id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="../controller/action_user.php?delete=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table> 
                    </div> 
                </div>
            </div>
        </div>
        
    </div>
    
</body>
</html>

<script>
    let table = new DataTable('#myTable');
</script>