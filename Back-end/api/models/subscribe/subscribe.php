<?php
class Subscribe{

    // database connection and table name
    private $conn;
    private $table_name = "subscribe";

    // object properties
    public $idMember;
    public $idSubType;
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
                     s.idMember, s.idSubType, s.dateDebut, s.dateFin
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
                idMember=:idMember, idSubType=:idSubType,  dateDebut=:dateDebut, dateFin=:dateFin";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idMember=htmlspecialchars(strip_tags($this->idMember));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));


        // bind values
        $stmt->bindParam(":idMember", $this->idMember);
        $stmt->bindParam(":idSubType", $this->idSubType);
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
                     s.dateDebut, s.dateFin
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
        return $stmt;
    }

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                dateDebut = :dateDebut,
                dateFin = :dateFin
                WHERE
                idMember = :idMember AND idSubType = :idSubType";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->dateDebut=htmlspecialchars(strip_tags($this->dateDebut));
        $this->dateFin=htmlspecialchars(strip_tags($this->dateFin));
        $this->idMember=htmlspecialchars(strip_tags($this->idMember));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));
        // bind new values
        $stmt->bindParam(':dateDebut', $this->dateDebut);
        $stmt->bindParam(':dateFin', $this->dateFin);
        $stmt->bindParam(':idMember', $this->idMember);
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
        $query = "DELETE FROM " . $this->table_name . " WHERE idMember=:idMember AND idSubType=:idSubType";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idMember=htmlspecialchars(strip_tags($this->idMember));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));

        // bind id of record to delete
        $stmt->bindParam(":idMember", $this->idMember);
        $stmt->bindParam(":idSubType", $this->idSubType);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}