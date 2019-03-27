<?php
class Trainer{

    // database connection and table name
    private $conn;
    private $table_name = "trainer";

    // object properties
    public $idTrainer;
    public $nameTrainer;
    public $addressTrainer;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read salles
    function read(){

        // select all query
        $query = "SELECT
                     s.idTrainer, s.nameTrainer, s.addressTrainer
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.idTrainer DESC";

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
                    nameTrainer=:nameTrainer, addressTrainer=:addressTrainer";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameTrainer=htmlspecialchars(strip_tags($this->nameTrainer));
        $this->addressTrainer=htmlspecialchars(strip_tags($this->addressTrainer));


        // bind values
        $stmt->bindParam(":nameTrainer", $this->nameTrainer);
        $stmt->bindParam(":addressTrainer", $this->addressTrainer);


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
                     s.idTrainer, s.nameTrainer, s.addressTrainer
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.idTrainer = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of salle to be updated
        $stmt->bindParam(1, $this->idTrainer);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameTrainer = $row['nameTrainer'];
        $this->addressTrainer = $row['addressTrainer'];
    }

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameTrainer = :nameTrainer,
                addressTrainer = :addressTrainer
                WHERE
                idTrainer = :idTrainer";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameTrainer=htmlspecialchars(strip_tags($this->nameTrainer));
        $this->addressTrainer=htmlspecialchars(strip_tags($this->addressTrainer));
        $this->idTrainer=htmlspecialchars(strip_tags($this->idTrainer));

        // bind new values
        $stmt->bindParam(':nameTrainer', $this->nameTrainer);
        $stmt->bindParam(':addressTrainer', $this->addressTrainer);
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
        $query = "DELETE FROM " . $this->table_name . " WHERE idTrainer = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idTrainer=htmlspecialchars(strip_tags($this->idTrainer));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idTrainer);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}