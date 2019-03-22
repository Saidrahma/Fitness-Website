<?php
class Gym{

    // database connection and table name
    private $conn;
    private $table_name = "salle";

    // object properties
    public $idSalle;
    public $nameSalle;
    public $addressSalle;
    public $townSalle;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read products
    function read(){

        // select all query
        $query = "SELECT
                     s.idSalle, s.nameSalle, s.addressSalle, s.townSalle
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.idSalle DESC";

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
                    nameSalle=:nameSalle, addressSalle=:addressSalle, townSalle=:townSalle";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameSalle=htmlspecialchars(strip_tags($this->nameSalle));
        $this->addressSalle=htmlspecialchars(strip_tags($this->addressSalle));
        $this->townSalle=htmlspecialchars(strip_tags($this->townSalle));


        // bind values
        $stmt->bindParam(":nameSalle", $this->nameSalle);
        $stmt->bindParam(":addressSalle", $this->addressSalle);
        $stmt->bindParam(":townSalle", $this->townSalle);


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
                     s.idSalle, s.nameSalle, s.addressSalle, s.townSalle
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.idSalle = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->idSalle);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameSalle = $row['nameSalle'];
        $this->addressSalle = $row['addressSalle'];
        $this->townSalle = $row['townSalle'];
    }

    // ***************************************************** //
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameSalle = :nameSalle,
                addressSalle = :addressSalle,
                townSalle = :townSalle,
                WHERE
                idSalle = :idSalle";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameSalle=htmlspecialchars(strip_tags($this->nameSalle));
        $this->addressSalle=htmlspecialchars(strip_tags($this->addressSalle));
        $this->townSalle=htmlspecialchars(strip_tags($this->townSalle));
        $this->idSalle=htmlspecialchars(strip_tags($this->idSalle));

        // bind new values
        $stmt->bindParam(':nameSalle', $this->nameSalle);
        $stmt->bindParam(':addressSalle', $this->addressSalle);
        $stmt->bindParam(':townSalle', $this->townSalle);
        $stmt->bindParam(':idSalle', $this->idSalle);

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
        $query = "DELETE FROM " . $this->table_name . " WHERE idSalle = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idSalle=htmlspecialchars(strip_tags($this->idSalle));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idSalle);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}