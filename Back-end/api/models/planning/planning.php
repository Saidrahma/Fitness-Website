<?php
class Planning{

    // database connection and table name
    private $conn;
    private $table_name = "planning";

    // object properties
    public $idDay;
    public $day;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read products
    function read(){

        // select all query
        $query = "SELECT
                     p.idDay, p.day
                FROM
                    " . $this->table_name . " p
                ORDER BY
                    p.idDay DESC";

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
                    day=:day";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->day=htmlspecialchars(strip_tags($this->day));

        // bind values
        $stmt->bindParam(":day", $this->day);

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
                    p.idDay, p.day
                FROM
                    " . $this->table_name . " p
                WHERE
                    p.idDay = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->idDay);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->day = $row['day'];

    }

    // ***************************************************** //
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                day = :day
                WHERE
                idDay = :idDay";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->day=htmlspecialchars(strip_tags($this->day));
        $this->idDay=htmlspecialchars(strip_tags($this->idDay));

        // bind new values
        $stmt->bindParam(':day', $this->day);
        $stmt->bindParam(':idDay', $this->idDay);


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
        $query = "DELETE FROM " . $this->table_name . " WHERE idDay = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idDay=htmlspecialchars(strip_tags($this->idDay));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idDay);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}