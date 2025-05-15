<?php 
require_once 'database.php';

class Task{
    private $conn;
    
    public function __construct(){
        $db= new Database();
        $this->conn = $db->connect();
    }

    public function getAllTasks(){
        $query = "SELECT * FROM tbl_task ORDER BY id DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllTasksByUserId($user_id){
        $query = "SELECT * FROM tbl_task WHERE user_id = ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getTaskById($id){
        $query = "SELECT * FROM tbl_task WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addTask($user_id,$title, $description, $color){
        $query = "INSERT INTO tbl_task SET user_id = ?,title = ?, description = ?,color = ?,date_created = NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isss",$user_id, $title, $description,$color);
        return $stmt->execute();
    }

    public function updateTask($id, $title, $description, $color){
        $query = "UPDATE tbl_task SET title = ?, description = ?, color = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $title, $description, $color, $id);
        return $stmt->execute();
    }

    public function deleteTask($id){
        $query = "DELETE FROM tbl_task WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function completeTask($status,$id){
        $query = "UPDATE tbl_task SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $status,$id);
        return $stmt->execute();
    }

    //filter task by date timestamp
    public function filterTaskByDate($date, $user_id){
        $query = "SELECT * FROM tbl_task WHERE date_created = ? AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $date,$user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    //get completed task
    public function getCompletedTask($user_id){
        $query = "SELECT * FROM tbl_task WHERE status = 1 AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}

?>