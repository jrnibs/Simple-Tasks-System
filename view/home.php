<?php 
include '../controller/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <?php include __DIR__ . '/../includes/href.php'; ?>
</head>
<body class="img-bg">
    <?php include '../includes/navbar.php'; ?>

    <div class="container text-center mt-5">
        <div class="welcome-heading">
            <h1 class="display-4">WELCOME TO TASKBOARD</h1>
            <h2 class="text-primary">
                <?php echo $user_login['fname'].' '.$user_login['lname']; ?>
            </h2>
        </div>

        <div class="row justify-content-center mt-4">
            <!-- My Tasks (all tasks) -->
            <div class="col-md-3">
                <a href="list_task.php" style="text-decoration: none;">
                    <div class="sticky-note bg-warning text-dark">
                        <div class="note-title">My Tasks</div>
                        <div class="note-content">View and manage your current tasks here.</div>
                    </div>
                </a>
            </div>

            <!-- Add Task (open modal or add page) -->
            <div class="col-md-3">
                <a href="list_task.php#addtask" style="text-decoration: none;">
                    <div class="sticky-note bg-info text-white">
                        <div class="note-title">Add Task</div>
                        <div class="note-content">Quickly add a new task to your board.</div>
                    </div>
                </a>
            </div>

            <!-- Completed Tasks (filter) -->
            <div class="col-md-3">
                <a href="list_task.php?filter=completed" style="text-decoration: none;">
                    <div class="sticky-note bg-danger text-white">
                        <div class="note-title">Completed</div>
                        <div class="note-content">Check your progress and completed items.</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
