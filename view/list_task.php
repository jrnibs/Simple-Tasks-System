<?php include '../controller/session.php'; 
include '../model/task.php';

$task = new Task();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <?php include '../includes/href.php'; ?>
    <style>

    </style>
</head>
<body class="img-bg">
    <?php include '../includes/navbar.php'; ?>
    <div class="container-fluid">
        <div class="row mt-2">
            <h1>Task</h1>
        </div>
        
        <div class="row mt-2">
            <div class="row">
                <div class="col-md-2">
                    <!-- Button to add a new task -->
                    <a href="add.php" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addtask"><i class="fa fa-add"></i> New Task</a>

                    <!--ADD TASK Modal -->
                    <div class="modal fade" id="addtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">NEW TASK</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../controller/action_task.php" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user_login['user_id']; ?>">
                                        <div class="form-group mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group d-flex mb-3">
                                            <label for="color" class="form-label">Color</label>
                                            <input type="color" class="form-control form-control-color mx-2" id="color" name="color" value="#ffd700" title="Choose your color">
                                        </div>
                                        
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="add" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <form action="../controller/action_task.php" method="post" class="mb-3">
                        <div class="form-group d-flex">
                            <input type="date" name="date" class="form-control me-2">
                            <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <hr>
            </div>
            
                <?php 
                if (isset($_GET['filter']) && $_GET['filter'] === 'completed') {
                    $tasks = $task->getCompletedTask(); // You need to implement this in your model
                    echo "<h4 class='text-center'>Showing Completed Tasks</h4>";

                } elseif (isset($_GET['date'])){
                    $date = $_GET['date'];
                    $tasks = $task->filterTaskByDate($date);

                    $date_fr = new DateTime($date);
                    // Format the date and time
                    $formattedDate = $date_fr->format('M d, Y'); // Jan 15, 2025 at 08:00 PM

                    if($tasks){
                        echo "<h4 class='text-center'>Filtered Task for: $formattedDate</h4>";
                    }else{
                        echo "<h4 class='text-center'>No Task Found for: $formattedDate</h4>";
                    }
                    

                }else{
                    $tasks = $task->getAllTasks();
                }

                foreach($tasks as $task_row){ 
                    $color = preg_match('/^#[a-fA-F0-9]{6}$/', $task_row['color']) ? $task_row['color'] : '#ffd700'; // fallback if invalid


                    
                    ?>
                <div class="col-sm-12 col-md-4 col-lg-2 mb-3">
                    <div class="sticky-note" style="background-color: <?php echo htmlspecialchars($color); ?>; border-left: 8px solid <?php echo htmlspecialchars($color); ?>;">
                    <small>Color: <?php echo htmlspecialchars($color); ?></small>

                    <div class="task-actions dropdown">
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-gear"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button data-bs-toggle="modal" data-bs-target="#viewtask<?php echo $task_row['id']; ?>" class="dropdown-item">
                                    <i class="fa-solid fa-eye"></i> View
                                </button>
                            </li>

                            <?php if ($task_row['status'] != 1){ ?>
                            <li>
                                <button data-bs-toggle="modal" data-bs-target="#edittask<?php echo $task_row['id']; ?>" class="dropdown-item">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a href="../controller/action_task.php?status=0&&complete=<?php echo $task_row['id']; ?>" class="dropdown-item">
                                    <i class="fa-solid fa-asterisk"></i> Uncomplete
                                </a>
                            </li>
                            <?php } ?>

                            <li>
                                <a href="../controller/action_task.php?delete=<?php echo $task_row['id']; ?>" class="dropdown-item text-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>


                        <div class="note-title"><?php echo $task_row['title']; ?></div>
                        <div class="note-content"><?php echo $task_row['description']; ?></div>

                        <div class="sticky-footer d-flex justify-content-between">
                            
                            <!-- "Complete" Button -->
                            <?php if ($task_row['status'] != 1){ ?>
                            <a href="../controller/action_task.php?status=1&&complete=<?php echo $task_row['id']; ?>" class="btn btn-info badge">
                                <i class="fas fa-check"></i> Complete
                            </a>
                            <?php }else{ ?>
                            <span class="badge bg-success">Completed</span>
                            <?php } ?>

                            <small class="text-muted"> 
                                <?php // Assuming $task_row['date_created'] contains the datetime string from the database
                                $date = new DateTime($task_row['date_created']);

                                // Format the date and time
                                $formattedDate = $date->format('M d, Y \: h:i A'); // Jan 15, 2025 at 08:00 PM

                                echo $formattedDate; ?>
                            </small>
                        </div>

                    </div>
                </div>
           

            <!--View TASK Modal -->
            <div class="modal fade" id="viewtask<?php echo $task_row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content" style="border: 2px solid <?php echo $color; ?>;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DETAILS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" >
                            <h2><?php echo $task_row['title']; ?></h2> <br>
                            
                            <p><?php echo $task_row['description']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

             <!--EDIT TASK Modal -->
            <div class="modal fade" id="edittask<?php echo $task_row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT TASK</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../controller/action_task.php" method="post">
                                <input type="hidden" name="task_id" value="<?php echo $task_row['id']; ?>">


                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $task_row['title']; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo $task_row['description']; ?></textarea>
                                </div>
                                <div class="form-group d-flex mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="color" class="form-control form-control-color mx-2" id="color" name="color" value="<?php echo $task_row['color']; ?>" title="Choose your color">

                                </div>
                                
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Check if URL hash is #addtask
    if (window.location.hash === '#addtask') {
        var myModal = new bootstrap.Modal(document.getElementById('addtask'));
        myModal.show();
    }
});
</script>