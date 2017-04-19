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
    public function get_picture_path($id){
        // Query erstellen
        $query = "SELECT picture FROM {$this->tableName} WHERE id=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $results = $result->fetch_array();
        $path = $results[0];
        // Den gefundenen Datensatz zurückgeben
        return $path;
    }
}