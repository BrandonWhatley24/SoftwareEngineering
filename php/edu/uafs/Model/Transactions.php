<?php
class Transactions {
    private $transID;
    private $Credit;
    private $Date;
    private $Balance;

    public function getTransID(){
        return $this->transID;
    }

    public function setTransID($transID){
        $this->transID = $transID;
    }

    public function getCredit(){
        return $this->Credit;
    }

    public function setCredit($Credit){
        $this->Credit = $Credit;
    }

    public function getDate(){
        return $this->Date;
    }

    public function setDate($Date){
        $this->Date = $Date;
    }

    public function getBalance(){
        return $this->Balance;
    }

    public function setBalance($Balance){
        $this->Balance = $Balance;
    }
}


?>