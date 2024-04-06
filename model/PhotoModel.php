<?php
require_once PROJECT_ROOT_PATH . "/model/Database.php";

const GET_PHOTOS_SQL = <<<'SQL'
SELECT 
    photos.id, 
    photos.name, 
    photos.description, 
    photos.date AS publishDate, 
    users.login AS userLogin
FROM photos
JOIN users ON photos.userId = users.id
ORDER BY photos.id ASC LIMIT ?
SQL;

class PhotoModel extends Database
{
    public function getPhotos($limit): array
    {
        return $this->select(GET_PHOTOS_SQL, ["i", $limit]);
    }

    /*
    public function addPhoto()
    {
        $fields = ['login', 'password', 'email', 'admin']
        return $this->insert("photos", $fields, $values)
    }
    */
}