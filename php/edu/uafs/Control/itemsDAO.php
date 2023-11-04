<?php
require("Creds.php"); 
class Item implements JsonSerializable{
    private $id;
    private $itemPrice;
    private $itemName;
    private $itemLength;
    private $itemWidth;

    public function jsonSerialize() {
        // Define which properties you want to serialize
        return [
            'id' => $this->getId(),
            'itemPrice' => $this->getitemPrice(),
            'itemName'=> $this->getitemName(),
            'itemLength'=> $this->getitemLength(),
             'itemWidth'=> $this->getitemWidth(),
           
            // ... Include other properties you want to serialize
        ];
    }
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

class ItemDAO extends Creds {
    

    
    public function getAllItems(){
        $allItems = array();
        $sql = "SELECT * FROM items";
        $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
        $pstmt = $con->prepare($sql);
      
        $pstmt = $con->prepare($sql);
               
        $pstmt->execute();
        $result = $pstmt->get_result();

        if ($result != null) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $csItem = new Item($row["itemID"],$row["itemprice"],$row["itemname"],$row["itemLength"],$row["itemWidth"]);
                
                $allItems[$i] = $csItem;
               
                $i++; 
                //$id, $itemPrice, $itemName, $itemLength,$itemWidth
            }
        }

        $con->close();
        return $allItems;
    

    }

  
}

?>