<?php
class Member{

    // database connection and table name
    private $conn;
    private $table_name = "membre";

    // object properties
    public $idMembre;
    public $nameMembre;
    public $addressMembre;
    public $DateNais;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // ***************************************************** //
    // read products
    function read(){

        // select all query
        $query = "SELECT
                     m.idMembre, m.nameMembre, m.addressMembre, m.DateNais
                FROM
                    " . $this->table_name . " m
                ORDER BY
                    m.idMembre DESC";

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
                    nameMembre=:nameMembre, addressMembre=:addressMembre, DateNais=:DateNais";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameMembre=htmlspecialchars(strip_tags($this->nameMembre));
        $this->addressMembre=htmlspecialchars(strip_tags($this->addressMembre));
        $this->DateNais=htmlspecialchars(strip_tags($this->DateNais));


        // bind values
        $stmt->bindParam(":nameMembre", $this->nameMembre);
        $stmt->bindParam(":addressMembre", $this->addressMembre);
        $stmt->bindParam(":DateNais", $this->DateNais);


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
                     m.idMembre, m.nameMembre, m.addressMembre, m.DateNais
                FROM
                    " . $this->table_name . " m
                WHERE
                    m.idMembre = ?
                LIMIT
                    0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->idMembre);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nameMembre = $row['nameMembre'];
        $this->addressMembre = $row['addressMembre'];
        $this->DateNais = $row['DateNais'];

        echo $this->nameMembre;
    }

    // ***************************************************** //
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nameMembre = :nameMembre,
                addressMembre = :addressMembre,
                DateNais = :DateNais
                WHERE
                idMembre = :idMembre";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nameMembre=htmlspecialchars(strip_tags($this->nameMembre));
        $this->addressMembre=htmlspecialchars(strip_tags($this->addressMembre));
        $this->DateNais=htmlspecialchars(strip_tags($this->DateNais));
        $this->idMembre=htmlspecialchars(strip_tags($this->idMembre));

        // bind new values
        $stmt->bindParam(':nameMembre', $this->nameMembre);
        $stmt->bindParam(':addressMembre', $this->addressMembre);
        $stmt->bindParam(':DateNais', $this->DateNais);
        $stmt->bindParam(':idMembre', $this->idMembre);


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
        $query = "DELETE FROM " . $this->table_name . " WHERE idMembre = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->idMembre=htmlspecialchars(strip_tags($this->idMembre));

        // bind id of record to delete
        $stmt->bindParam(1, $this->idMembre);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}