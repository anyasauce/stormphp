<?php
require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    public function getUsers()
    {
        $result = $this->db->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
