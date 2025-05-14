<?php 

include '../model/task.php';
$task = new Task();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['edit'])) {
        $task_id = $_POST['task_id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $color = $_POST['color'];

        // Validate the color
        if (!preg_match('/^#[a-fA-F0-9]{6}$/', $color)) {
            $color = '#ffd700'; // default fallback
        }

        if($task->updateTask($task_id, $title, $desc, $color)) {
            echo "<script>alert('Task updated successfully');</script>";
            header('location: ../view/list_task.php');
            exit();
        } else {
            echo "<script>alert('Failed to update Task');</script>";
            header('location: ../view/list_task.php');
            exit();
        }
    }elseif(isset($_POST['add'])) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $color = $_POST['color'];
        $user_id = $_POST['user_id'];

        if($task->addTask( $user_id,$title, $desc, $color)) {
            echo "<script>alert('Task added successfully');</script>";
            header('location: ../view/list_task.php');
            exit();
        } else {
            echo "<script>alert('Failed to add Task');</script>";
            header('location: ../view/list_task.php');
            exit();
        }
    }

    if(isset($_POST['filter'])){
        $date = $_POST['date'];
        if($date == ""){
            echo "<script>alert('Please select a date');</script>";
            header('location: ../view/list_task.php');
            exit();
        }else {
            echo "<script>alert('Task filtered successfully');</script>";
            header('location: ../view/list_task.php?date='.$date);
            exit();
        }
    }
} elseif( $_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['delete'])){
        $task_id = $_GET['delete'];
        if($task->deleteTask($task_id)) {
            echo "<script>alert('Task deleted successfully');</script>";
            header('location: ../view/list_task.php');
            exit();
        } else {
            echo "<script>alert('Failed to delete Task');</script>";
            header('location: ../view/list_task.php');
            exit();
        }
    } else if(isset($_GET['complete'])){
        $task_id = $_GET['complete'];
        $status = $_GET['status'];

        if($task->completeTask($status,$task_id)){
            if($tatus == 1){
                echo "<script>alert('Task Complete successfully');</script>";
            }else {
                echo "<script>alert('Task Uncomplete successfully');</script>";
            }
            
            header('location: ../view/list_task.php');
            exit();
        } else {
            echo "<script>alert('Failed to Complete Task');</script>";
            header('location: ../view/list_task.php');
            exit();
        }
    }
} 

?>