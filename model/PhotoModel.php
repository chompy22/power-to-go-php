<?php
require_once PROJECT_ROOT_PATH . "/model/Database.php";

const SQL_QUERY = "SELECT * " .
    "FROM photo " .
    "JOIN users ON photo.userId = users.id " .
    "ORDER BY photo.date ASC LIMIT ?";

class PhotoModel extends Database
{
    public function getPhotos($limit)
    {
        return $this->select(SQL_QUERY, ["i", $limit]);
    }
}