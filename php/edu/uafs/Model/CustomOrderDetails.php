<?php

    class CustomOrderDetails{

        private $custOrderDetailID;
        private $ItemID;
        private $orderDescription;
        private $OrderID;

        public function getCustOrderDetailID() {
            return $this->custOrderDetailID;
        }
    
        // Setter for custOrderDetailID
        public function setCustOrderDetailID($custOrderDetailID) {
            $this->custOrderDetailID = $custOrderDetailID;
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
    
        // Getter for OrderID
        public function getOrderID() {
            return $this->OrderID;
        }
    
        // Setter for OrderID
        public function setOrderID($OrderID) {
            $this->OrderID = $OrderID;
        }

    }

?>