<?php

class ItemDAO {
    private $db; // Database connection

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Create a new record
    public function create(Item $entity) {
        $sql = "INSERT INTO items (itemPrice, itemName, itemLength, itemWidth) VALUES (:value1, :value2, :value3, :value4)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value1', $entity->getitemPrice());
        $stmt->bindValue(':value2', $entity->getitemName());
        $stmt->bindValue(':value3', $entity->getitemLength());
        $stmt->bindValue(':value4', $entity->getitemWidth());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Retrieve a record by ID
    public function getById($id) {
        $sql = "SELECT * FROM items WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            // Create and return a YourEntity object from the result
            return new Item($result);
        } else {
            return null;
        }
    }

    // Update a record
    public function update(Item $entity) {
        $sql = "UPDATE item SET itemPrice = :value1, itemName = :value2, itemLength = :value3, itemWidth = :value4 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':value1', $entity->setitemPrice());
        $stmt->bindValue(':value2', $entity->getitemName());
        $stmt->bindValue(':value3', $entity->getitemLength());
        $stmt->bindValue(':value4', $entity->getitemWidth());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM items WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
class Item {
    private $id;
    private $itemPrice;
    private $itemName;
    private $itemLength;
    private $itemWidth;

    public function __construct($id, $itemPrice, $itemName, $itemLength,$itemWidth) {
        $this->id = $id;
        $this->itemPrice = $itemPrice;
        $this->itemName = $itemName;
        $this->itemLength = $itemLength;
        $this->itemWidth = $itemWidth;
    }

    public function getId() {
        return $this->id;
    }

    public function getitemPrice() {
        return $this->itemPrice;
    }

    public function getitemName() {
        return $this->itemName;
    }
    public function getitemLength() {
        return $this->itemLength;
    }
    public function getitemWidth() {
        return $this->itemWidth;
    }

    // You can also add setter methods if needed

    public function setitemPrice($itemPrice) {
        $this->itemPrice = $itemPrice;
    }

    public function setFname($itemName) {
        $this->itemName = $itemName;
    }
    public function setusername($itemLength) {
        $this->itemLength = $itemLength;
    }
    public function setitemWidth($itemWidth) {
        $this->itemWidth = $itemWidth;
    }

    // Additional methods for your entity can be added here
}
?>
