<?php
class SubscriptionType{

    // database connection and table name
    private $conn;
    private $table_name = "subscription_type";

    // object properties
    public $idSubType;
    public $nameSubType;
    public $priceSubType;
    public $durationSubType;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read salles
    function read(){

        // select all query
        $query = "SELECT
                     s.idSubType, s.nameSubType, s.priceSubType, s.durationSubType
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.idSubType DESC";

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
                    nameSubType=:nameSubType, priceSubType=:priceSubType, durationSubType=:durationSubType";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameSubType=htmlspecialchars(strip_tags($this->nameSubType));
        $this->priceSubType=htmlspecialchars(strip_tags($this->priceSubType));
        $this->durationSubType=htmlspecialchars(strip_tags($this->durationSubType));


        // bind values
        $stmt->bindParam(":nameSubType", $this->nameSubType);
        $stmt->bindParam(":priceSubType", $this->priceSubType);
        $stmt->bindParam(":durationSubType", $this->durationSubType);


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
                     s.idSubType, s.nameSubType, s.priceSubType, s.durationSubType
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.idSubType = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of salle to be updated
        $stmt->bindParam(1, $this->idSubType);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameSubType = $row['nameSubType'];
        $this->priceSubType = $row['priceSubType'];
        $this->durationSubType = $row['durationSubType'];
    }

    // ***************************************************** //
    // update the salle
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameSubType = :nameSubType,
                priceSubType = :priceSubType,
                durationSubType = :durationSubType
                WHERE
                idSubType = :idSubType";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameSubType=htmlspecialchars(strip_tags($this->nameSubType));
        $this->priceSubType=htmlspecialchars(strip_tags($this->priceSubType));
        $this->durationSubType=htmlspecialchars(strip_tags($this->durationSubType));
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));

        // bind new values
        $stmt->bindParam(':nameSubType', $this->nameSubType);
        $stmt->bindParam(':priceSubType', $this->priceSubType);
        $stmt->bindParam(':durationSubType', $this->durationSubType);
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
        $query = "DELETE FROM " . $this->table_name . " WHERE idSubType = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idSubType=htmlspecialchars(strip_tags($this->idSubType));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idSubType);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}