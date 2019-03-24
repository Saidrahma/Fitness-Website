<?php
class SubscriptionType{

    // database connection and table name
    private $conn;
    private $table_name = "subscription_type";

    // object properties
    public $idMember;
    public $idActType;
    public $dateDebut;
    public $dateFin;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read salles
    function read(){

        // select all query
        $query = "SELECT
                     s.idMember, s.idActType, s.dateDebut, s.dateFin
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.idMember DESC";

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
                    idActType=:idActType, dateDebut=:dateDebut, dateFin=:dateFin";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));


        // bind values
        $stmt->bindParam(":idActType", $this->idActType);
        $stmt->bindParam(":dateDebut", $this->dateDebut);
        $stmt->bindParam(":dateFin", $this->dateFin);


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
                     s.idMember, s.idActType, s.dateDebut, s.dateFin
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.idMember = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of salle to be updated
        $stmt->bindParam(1, $this->idMember);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->idActType = $row['idActType'];
        $this->dateDebut = $row['dateDebut'];
        $this->dateFin = $row['dateFin'];
    }

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                idActType = :idActType,
                dateDebut = :dateDebut,
                dateFin = :dateFin
                WHERE
                idMember = :idMember";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));
        $this->idMember=htmlspecialchars(strip_tags($this->idMember));

        // bind new values
        $stmt->bindParam(':idActType', $this->idActType);
        $stmt->bindParam(':dateDebut', $this->dateDebut);
        $stmt->bindParam(':dateFin', $this->dateFin);
        $stmt->bindParam(':idMember', $this->idMember);

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
        $query = "DELETE FROM " . $this->table_name . " WHERE idMember = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idMember=htmlspecialchars(strip_tags($this->idMember));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idMember);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}