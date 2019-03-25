<?php
class Activity{

    // database connection and table name
    private $conn;
    private $table_name = "activity";

    // object properties
    public $idActivity;
    public $nameActivity;
    public $description;
    public $idDay;
    public $idActType;
    public $idTrainer;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read salles
    function read(){

        // select all query
        $query = "SELECT
                     a.idActivity, a.nameActivity, a.description, a.idDay, a.idActType, a.idTrainer
                FROM
                    " . $this->table_name . " a
                ORDER BY
                    a.idActivity DESC";

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
                    nameActivity=:nameActivity, description=:description, idDay=:idDay, idActType=:idActType,  idTrainer=:idTrainer";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameActivity=htmlspecialchars(strip_tags($this->nameActivity));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->idDay=htmlspecialchars(strip_tags($this->idDay));
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->idTrainer=htmlspecialchars(strip_tags($this->idTrainer));


        // bind values
        $stmt->bindParam(":nameActivity", $this->nameActivity);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":idDay", $this->idDay);
        $stmt->bindParam(":idActType", $this->idActType);
        $stmt->bindParam(":idTrainer", $this->idTrainer);


        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // ***************************************************** //
    // used when filling up the update salle form
    function readOne(){

        // query to read single record
        $query = "SELECT
                     a.idActivity, a.nameActivity, a.description, a.idDay, a.idActType, a.idTrainer
                FROM
                    " . $this->table_name . " a
                WHERE
                    a.idActivity = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of salle to be updated
        $stmt->bindParam(1, $this->idActivity);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameActivity = $row['nameActivity'];
        $this->description = $row['description'];
        $this->idDay = $row['idDay'];
        $this->idActType = $row['idActType'];
        $this->idTrainer = $row['idTrainer'];
    }

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameActivity = :nameActivity,
                description = :description,
                idDay = :idDay,
                idActType =: idActType,
                idTrainer =: idTrainer
                WHERE
                idActivity = :idActivity";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameActivity=htmlspecialchars(strip_tags($this->nameActivity));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->idDay=htmlspecialchars(strip_tags($this->idDay));
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->idActivity=htmlspecialchars(strip_tags($this->idActivity));
        $this->idTrainer=htmlspecialchars(strip_tags($this->idTrainer));

        // bind new values
        $stmt->bindParam(':nameActivity', $this->nameActivity);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':idDay', $this->idDay);
        $stmt->bindParam(':idActType', $this->idActType);
        $stmt->bindParam(':idActivity', $this->idActivity);
        $stmt->bindParam(':idTrainer', $this->idTrainer);

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
        $query = "DELETE FROM " . $this->table_name . " WHERE idActivity = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActivity=htmlspecialchars(strip_tags($this->idActivity));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idActivity);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}