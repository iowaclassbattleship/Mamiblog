<?php
require_once '../lib/Repository.php';

class BlogRepository extends Repository
{
    protected $tableName = 'blog';

    /**
     * @param $picture
     * @param $title
     * @param $date
     * @param $creator
     * @param $private
     * @return bool
     */
    //saves picturepath in database
    public function upload($picture, $title, $date, $creator, $private){
        $query = "INSERT INTO $this->tableName (picture, title, date, creator, private) VALUES (?, ?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssi', $picture, $title, $date, $creator, $private);
        if (!$statement->execute()) {
            return false;
        }
        return ConnectionHandler::getConnection()->insert_id;
    }

    /**
     * @param $id
     * @param $picture
     * @return bool
     */
    //changes picturepath after renaming the picture
    public function update_picture($id, $picture) {
        $query = "UPDATE $this->tableName SET picture = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $picture, $id);
        if (!$statement->execute()) {
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    //returns picturepath
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

    /**
     * @return array
     * @throws Exception
     */
    //get all entries sorted by highest id
    public function readAllSortedByNewest(){
        $query = "SELECT * FROM {$this->tableName} ORDER BY id DESC ";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * @return array
     * @throws Exception
     */
    //get all entries marked by private
    public function readAllPrivate(){
        $query = "SELECT * FROM {$this->tableName} ORDER BY id DESC ";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * @param $id
     * @param $title
     * @return bool
     */
    //changes title of image
    public function updateTitle($id, $title){
        $query = "UPDATE $this->tableName SET title = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si', $title, $id);
        if (!$statement->execute()) {
            return false;
        }
        return true;
    }
}