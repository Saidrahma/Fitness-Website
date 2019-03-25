<?php
class ActivitySub{

    // database connection and table name
    private $conn;
    private $table_name = "activity_sub";

    // object properties
    public $idActType;
    public $idSubType;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read salles
    function read(){

        // select all query
        $query = "SELECT
                     s.idActType, s.idSubType
                FROM
                    " . $this->table_name . " s";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // ***************************************************** //
    // create salle
    function create(){
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                idActType=:idActType, idSubType=:idSubType";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));

        // bind values
        $stmt->bindParam(":idActType", $this->idActType);
        $stmt->bindParam(":idSubType", $this->idSubType);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // ***************************************************** //
    // used when filling up the update salle form

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                idActType = :idActType,
                idSubType = :idSubType
                WHERE
                idActType = :idActType AND idSubType = :idSubType";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));
        // bind new values
        $stmt->bindParam(':idActType', $this->idActType);
        $stmt->bindParam(':idSubType', $this->idSubType);
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // ***************************************************** //
    // delete the salle
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE idActType=:idActType AND idSubType=:idSubType";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));

        // bind id of record to delete
        $stmt->bindParam(":idActType", $this->idActType);
        $stmt->bindParam(":idSubType", $this->idSubType);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}