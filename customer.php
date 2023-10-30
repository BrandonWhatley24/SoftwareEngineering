<?php

class CustomerDAO {
    private $db; // Database connection

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Create a new record
    public function create(Customer $entity) {
        $sql = "INSERT INTO customers (Fname, Lname, Username, password, email) VALUES (:value1, :value2, :value3, :value4, :value5)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value1', $entity->getFname());
        $stmt->bindValue(':value2', $entity->getLname());
        $stmt->bindValue(':value3', $entity->getusername());
        $stmt->bindValue(':value4', $entity->getpassword());
        $stmt->bindValue(':value5', $entity->getemail());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Retrieve a record by ID
    public function getById($id) {
        $sql = "SELECT * FROM customers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            // Create and return a YourEntity object from the result
            return new Customer($result);
        } else {
            return null;
        }
    }

    // Update a record
    public function update(Customer $entity) {
        $sql = "UPDATE customers SET Fname = :value1, Lname = :value2, username = :value3, password = :value4, email = :value5 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':value1', $entity->getFname());
        $stmt->bindValue(':value2', $entity->getLname());
        $stmt->bindValue(':value3', $entity->getusername());
        $stmt->bindValue(':value4', $entity->getpassword());
        $stmt->bindValue(':value5', $entity->getemail());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM customers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
class Customer {
    private $id;
    private $Lname;
    private $Fname;
    private $username;
    private $password;
    private $email;

    public function __construct($id, $Lname, $Fname,$username,$password,$email) {
        $this->id = $id;
        $this->Lname = $Lname;
        $this->Fname = $Fname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
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
    public function getemail() {
        return $this->email;
    }

    // You can also add setter methods if needed

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
    public function setEmail($email) {
        $this->email = $email;
    }

    // Additional methods for your entity can be added here
}
?>
