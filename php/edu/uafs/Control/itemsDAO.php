<?php

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
}
?>