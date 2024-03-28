<?php
require_once PROJECT_ROOT_PATH . "/model/Database.php";

class PhotoModel extends Database
{
    public function getPhotos($limit)
    {
        return $this->select(`SELECT *
            FROM photo
            JOIN user ON photo.userId = user.id
            ORDER BY photo.date ASC LIMIT ?`, ["i", $limit]);
    }
}