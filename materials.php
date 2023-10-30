<?php

class Material=DAO {
    private $db; // Database connection

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Create a new record
    public function create(Material $entity) {
        $sql = "INSERT INTO materials (itemID, materialName, amountInStock,inStock) VALUES (:value1, :value2, :value3, :value4)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value1', $entity->getitemID());
        $stmt->bindValue(':value2', $entity->getmaterialName());
        $stmt->bindValue(':value3', $entity->getamountInStock());
        $stmt->bindValue(':value4', $entity->getinStock());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Retrieve a record by ID
    public function getById($id) {
        $sql = "SELECT * FROM materials WHERE id = :id";
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
    public function update(Material $entity) {
        $sql = "UPDATE materials SET itemID = :value1, materialName = :value2, amountInStock = :value3, inStock = :value4 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':value1', $entity->getitemID());
        $stmt->bindValue(':value2', $entity->getmaterialName());
        $stmt->bindValue(':value3', $entity->getamountInStock());
        $stmt->bindValue(':value4', $entity->getinStock());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM materials WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
class Material {
    private $id;
    private $itemID;
    private $materialName;
    private $amountInStock;
    private $inStock;

    public function __construct($id, $itemID, $materialName, $amountInStock,$inStock) {
        $this->id = $id;
        $this->itemID = $itemID;
        $this->materialName = $materialName;
        $this->amountInStock = $amountInStock;
        $this->inStock = $inStock;
    }

    public function getId() {
        return $this->id;
    }

    public function getitemID() {
        return $this->itemID;
    }

    public function getmaterialName() {
        return $this->materialName;
    }
    public function getamountInStock() {
        return $this->amountInStock;
    }
    public function getinStock() {
        return $this->inStock;
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
}
?>
