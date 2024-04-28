<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticateUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    // CRUD para usuarios
    public function createUser($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getUser($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($id, $username, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE users SET username = ?, password = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssi", $username, $hashed_password, $id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>
