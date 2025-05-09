<?php
namespace App\Models;

use Core\Model;
use Core\Database;

class User extends Model
{
    public function getAllUsers()
    {
        $result = $this->db->query("SELECT * FROM users");
        $users = [];

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public static function register($name, $email, $password)
    {
        $db = new Database();
        $conn = $db->getConn();

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            return ['error' => $conn->error];
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return ['error' => 'This email is already registered.'];
        }

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            return ['error' => $conn->error];
        }

        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            return ['success' => true];
        }

        return ['error' => 'An error occurred while registering. Please try again.'];
    }

    public static function login($email)
    {
        $db = new Database();
        $conn = $db->getConn();

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            return ['error' => $conn->error];
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return ['success' => true, 'user' => $user];
        }

        return ['error' => 'No user found with this email.'];
    }

    public static function update($id, $name, $email, $password = null)
    {
        $db = new Database();
        $conn = $db->getConn();

        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);

            if ($stmt === false) {
                return ['error' => $conn->error];
            }

            $stmt->bind_param("sssi", $name, $email, $hashedPassword, $id);
        } else {
            $query = "UPDATE users SET name = ?, email = ? WHERE id = ?";
            $stmt = $conn->prepare($query);

            if ($stmt === false) {
                return ['error' => $conn->error];
            }

            $stmt->bind_param("ssi", $name, $email, $id);
        }

        if ($stmt->execute()) {
            return ['success' => true];
        }

        return ['error' => 'An error occurred while updating the user.'];
    }


    public static function delete($id)
    {
        $db = new Database();
        $conn = $db->getConn();

        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            return ['error' => $conn->error];
        }

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return ['success' => true];
        }

        return ['error' => 'An error occurred while deleting the user.'];
    }
}