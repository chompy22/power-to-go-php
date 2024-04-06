<?php
require_once PROJECT_ROOT_PATH . "/model/Database.php";

const GET_PHOTOS_SQL = <<<'SQL'
SELECT 
    photo.id, 
    photo.name, 
    photo.description, 
    photo.date AS publishDate, 
    users.login AS userLogin
FROM photo
JOIN users ON photo.userId = users.id
ORDER BY photo.id ASC LIMIT ?
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
        return $this->insert("photo", $fields, $values)
    }
    */
}