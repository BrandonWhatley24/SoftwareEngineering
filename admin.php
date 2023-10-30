<?php

class AdminDAO {
    private $db; // Database connection

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Create a new record
    public function create(Admin $entity) {
        $sql = "INSERT INTO admins (Fname, Lname,password,username) VALUES (:value1, :value2, :value3, :value4)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value1', $entity->getFname());
        $stmt->bindValue(':value2', $entity->getLname());
        $stmt->bindValue(':value4', $entity->getusername());
        $stmt->bindValue(':value3', $entity->getpassword());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Retrieve a record by ID
    public function getById($id) {
        $sql = "SELECT * FROM admins WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            // Create and return a YourEntity object from the result
            return new Material($result);
        } else {
            return null;
        }
    }

    // Update a record
    public function update(Admin $entity) {
        $sql = "UPDATE materials SET Fname = :value1, Lname = :value2, password = :value3, username = :value4 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':value1', $entity->getFname());
        $stmt->bindValue(':value2', $entity->getLname());
        $stmt->bindValue(':value4', $entity->getusername());
        $stmt->bindValue(':value3', $entity->getpassword());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM admins WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
class Admin {
    private $id;
    private $Lname;
    private $Fname;
    private $username;
    private $password;

    public function __construct($id, $Lname, $Fname,$username,$password) {
        $this->id = $id;
        $this->Lname = $Lname;
        $this->Fname = $Fname;
        $this->username = $username;
        $this->password = $password;
        
    }

    public function getId() {
        return $this->id;
    }

    public function getLname() {
        return $this->Lname;
    }

    public function getFname() {
        return $this->Fname;
    }
    public function getpassword() {
        return $this->password;
    }
    public function getusername() {
        return $this->username;
    }

    // You can also add setter methods if needed

    public function setitemID($itemID) {
        $this->itemID = $itemID;
    }

    public function setmaterialName($materialName) {
        $this->materialName = $materialName;
    }
    public function setamountInStock($amountInStock) {
        $this->amountInStock = $amountInStock;
    }
    public function setinStock($inStock) {
        $this->inStock = $inStock;
    }

    // Additional methods for your entity can be added here
    public function setLname($Lname) {
        $this->Lname = $Lname;
    }

    public function setFname($Fname) {
        $this->Fname = $Fname;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}
?>
