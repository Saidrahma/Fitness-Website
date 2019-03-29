<?php
class ActivityType{

    // database connection and table name
    private $conn;
    private $table_name = "activity_type";

    // object properties
    public $idActType;
    public $nameType;
    public $description;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read products
    function read(){

        // select all query
        $query = "SELECT
                     p.idActType, p.nameType, p.description
                FROM
                    " . $this->table_name . " p
                ORDER BY
                    p.idActType DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // ***************************************************** //
    // create product
    function create(){
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nameType=:nameType, description=:description";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameType=htmlspecialchars(strip_tags($this->nameType));
        $this->description=htmlspecialchars(strip_tags($this->description));

        // bind values
        $stmt->bindParam(":nameType", $this->nameType);
        $stmt->bindParam(":description", $this->description);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // ***************************************************** //
    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT
                    p.idActType, p.nameType, p.description
                FROM
                    " . $this->table_name . " p
                WHERE
                    p.idActType = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->idActType);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameType = $row['nameType'];

    }

    // ***************************************************** //
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameType = :nameType,
                description=: description
                WHERE
                idActType = :idActType";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameType=htmlspecialchars(strip_tags($this->nameType));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));

        // bind new values
        $stmt->bindParam(':nameType', $this->nameType);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':idActType', $this->idActType);


        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // ***************************************************** //
    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE idActType = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idActType=htmlspecialchars(strip_tags($this->idActType));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idActType);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}