<?php 

require_once 'database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM tbl_user WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getUserId($username, $password) {
        $sql = "SELECT user_id FROM tbl_user WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['user_id'];
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM tbl_user";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM tbl_user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addUser($fname,$lname,$username,$password,$adddress,$email,$status) {
        $sql = "INSERT INTO tbl_user SET fname = ?, lname = ?, username = ?, password = ?, address = ?, email = ?, active = ?, date_created = NOW()";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $fname, $lname, $username, $password, $adddress, $email, $status);
        return $stmt->execute();
    }

    public function updateUser($user_id, $fname, $lname, $username, $password, $adddress, $email, $status) {
        $sql = "UPDATE tbl_user SET fname = ?, lname = ?, username = ?, password = ?, address = ?, email = ?, active= ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssii", $fname, $lname, $username, $password, $adddress, $email, $status, $user_id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM tbl_user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


}

?>