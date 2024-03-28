<?php
require_once "Database.php";

class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM user ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
}