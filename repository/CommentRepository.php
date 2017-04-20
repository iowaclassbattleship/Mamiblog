<?php

require_once '../lib/Repository.php';
require_once 'UserRepository.php';

class CommentRepository extends Repository
{
    protected $tableName = 'comments';
    protected $tableName1 = 'blog';
    protected $tableName2 = 'user';

    public function getComments($blogid){
        $query = "SELECT * FROM $this->tableName where blogid = ? ORDER BY id DESC";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $blogid);
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        $rows = [];
        $userRepository = new UserRepository();

        while ($row = $result->fetch_object()) {
            $user = $userRepository->readById($row->userid);
            $row->user = $user;

            $rows[] = $row;
        }
        return $rows;
    }
    public function createComment($userid, $blogid, $comment, $time){
        $query = "INSERT INTO $this->tableName (userid, blogid, comment, time) VALUES (?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iiss', $userid, $blogid, $comment, $time);

        if (!$statement->execute()) {
            return false;
        }
        return ConnectionHandler::getConnection()->insert_id;

    }

}
