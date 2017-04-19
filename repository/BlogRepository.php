<?php
require_once '../lib/Repository.php';

class BlogRepository extends Repository
{
    protected $tableName = 'blog';

    public function upload($picture, $title, $date, $comments){
        $query = "INSERT INTO $this->tableName (picture, title, date, comments) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $picture, $title, $date, $comments);

        if (!$statement->execute()) {
            return false;
        }

        return ConnectionHandler::getConnection()->insert_id;
    }

    public function update_picture($id, $picture) {
        $query = "UPDATE $this->tableName SET picture = ? WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $picture, $id);

        if (!$statement->execute()) {
            return false;
        }
    }
}