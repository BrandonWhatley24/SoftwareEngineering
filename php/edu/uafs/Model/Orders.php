<?php
class Orders{
    public $orderID;
    public $status;
    public  $amount;
    public $date;
    
    public $custID;
    public $isCustomOrder;
    public $transID;

    public function getCustID() {
        return $this->custID;
    }

    public function setCustID($custID) {
        $this->custID = $custID;
    }

    public function getIsCustomOrder() {
        return $this->isCustomOrder;
    }

    public function setIsCustomOrder($isCustomOrder) {
        $this->isCustomOrder = $isCustomOrder;
    }

    public function getTransID() {
        return $this->transID;
    }
    public function setTransID($transID) {
        $this->transID = $transID;
    }
    public function getOrderID() {
        return $this->orderID;
    }

    public function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }


}
?>
