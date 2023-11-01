<?php
    class NonCustomOrderDetails{

        private $orderDetailID;
        private $ItemID;

        private $orderDescription;

        private $orderID; 

          // Getter for orderDetailID
    public function getOrderDetailID() {
        return $this->orderDetailID;
    }

    // Setter for orderDetailID
    public function setOrderDetailID($orderDetailID) {
        $this->orderDetailID = $orderDetailID;
    }

    // Getter for ItemID
    public function getItemID() {
        return $this->ItemID;
    }

    // Setter for ItemID
    public function setItemID($ItemID) {
        $this->ItemID = $ItemID;
    }

    // Getter for orderDescription
    public function getOrderDescription() {
        return $this->orderDescription;
    }

    // Setter for orderDescription
    public function setOrderDescription($orderDescription) {
        $this->orderDescription = $orderDescription;
    }

    // Getter for orderID
    public function getOrderID() {
        return $this->orderID;
    }

    // Setter for orderID
    public function setOrderID($orderID) {
        $this->orderID = $orderID;
    }
    }

?>
