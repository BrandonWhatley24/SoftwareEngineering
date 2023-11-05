<?php
require("Creds.php"); 
class Orders implements JsonSerializable{
    private $orderID;
    private $status;
    private $amount;
    private $date;
    
    private $custID;
    private $isCustomOrder;
    private $transID;
    // Adding so I can send the private fields through json
    public function jsonSerialize() {
        // Define which properties you want to serialize
        return [
            'date' => $this->getDate(),
            'orderID' => $this->getOrderID(),
            'status'=> $this->getStatus(),
            'amount'=> $this->getAmount(),
             'custID'=> $this->getCustID(),
            'isCustomOrder'=> $this->getIsCustomOrder(),
            'transID'=>$this->getTransID(),
            // ... Include other properties you want to serialize
        ];
    }
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

class OrdersDAO extends Creds{
  

   

    public function getAllItemFromDatabase() {
        $myConsumersOrds = array();
        $sql = "SELECT * FROM orders;";

        $con = null;
        $pstmt = null;
        
        
        try {
            

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); 
            
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
            
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    
                }
                $pstmt = $con->prepare($sql);
               
                $pstmt->execute();
                $result = $pstmt->get_result();

                if ($result != null) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $csOrd = new Orders();
                        $csOrd->setOrderID ($row["orderID"]);
                        $csOrd->setCustID($row["custID"]);
                        $csOrd->setIsCustomOrder($row["isCustomOrder"]);
                        $csOrd->setAmount($row['amount']);
                        $csOrd->setDate($row['date']);
                        $csOrd->setTransID($row['transID']);
                        $csOrd->setStatus($row['status']);                      
                        $myConsumersOrds[$i] = $csOrd;
                        $i++; 
                    }
                }

                $con->close();
                return $myConsumersOrds;
            
        } catch (Exception $e) {
            echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
            echo $e->getMessage();
            return null;
        }
    }

    public function insertOrder($custID,$isCustomOrder,$amount,$orderDate,$transID,$orderStatus){
        $con = null;
        $pstmt = null;
        $sql = "INSERT INTO orders(CustID,IsCustomOrder,Amount,OrderDate,TransID,OrderStatus)VALUES(?,?,?,?,?,?)";

        try{
            //establish connection
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());

            //prepare statement

            $pstmt = $con->prepare($sql);
            $pstmt->bind_param("isdsis", $custID,$isCustomOrder, $amount, $orderDate,$transID,$orderStatus);

            //execute query
            $pstmt->execute();

            //return result if needed
            //close connection
            $con->close();

            return true; 

        }catch(Exception $e) {
            echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
            echo $e->getMessage();
            return false;
        }
    }

    public function updateOrder($orderID,$custID,$isCustomOrder,$amount,$orderDate,$transID,$orderStatus){

        $con = null;
        $pstmt = null;
        $sql = "UPDATE ConsumerOrders SET CustID=?,IsCustomOrder=?,Amount=?,OrderDate=?,TransID=?,OrderStatus=? WHERE(OrderID=?)";

        try{    
            //establish a connection
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());

            //prepare statement
            $pstmt = $con->prepare($sql);
            $pstmt->bind_param("isdsisi",$custID,$isCustomOrder, $amount, $orderDate,$transID,$orderStatus,$orderID);
            
            //execute query
            $pstmt->execute();
            
            //close connection
            $con->close();
        }catch(Exception $e) {
            echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteOrder( $orderID ){
        $con = null;
        $pstmt = null;
        $sql = "DELETE FROM orders WHERE OrderID=?";

        try{
            //establish connection
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());

            //prepare statement
            $pstmt = $con->prepare($sql);
            $pstmt->bind_param("i",$orderID);

            //execute
            $pstmt->execute();

            $con->close();

            return true; 
        }catch(Exception $e) {
            echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
            echo $e->getMessage();
            return false;
            
        }


    }

    public function listOrderBasedOnCustID( $custID ){

        $con = null;
        $pstmt = null;
        $sql = "SELECT * FROM orders WHERE custID=?;";
        $orders = array(); 
        try{
            //establish connection
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
            //prepare statement
            $pstmt = $con->prepare($sql);
            $pstmt->bind_param("i",$custID);

            //execute
            $pstmt->execute();

            //return resultset

            $result = $pstmt->get_result();

            if($result!=null){
                $i=0;
                while ($row = $result->fetch_assoc()) {
                    $csOrd = new Orders();
                    $csOrd->setOrderID ($row["orderID"]);
                    $csOrd->setCustID($row["custID"]);
                    $csOrd->setIsCustomOrder($row["isCustomOrder"]);
                    $csOrd->setAmount($row['Amount']);
                    $csOrd->setDate($row['Date']);
                    $csOrd->setTransID($row['TransID']);
                    $csOrd->setStatus($row['Status']);                      
                    $orders[$i] = $csOrd;
                    $i++; 
                }

            }

            //close connection 

            $con->close();

            return $orders;

        }catch(Exception $e) {
            echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
            echo $e->getMessage();
            return null;
        }

    }

    public function getOrderByID($orderID){
        $order = null; 
        $con = null;
        $pstmt = null; 
        $sql = "SELECT * FROM orders WHERE orderID=?";

        try{

            //establish connection
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
             //prepare statement
             $pstmt = $con->prepare($sql);
             $pstmt->bind_param("i",$orderID);
             $pstmt->execute();
             $result = $pstmt->get_result();

             if($result!=null){
                $i=0;
                while ($row = $result->fetch_assoc()) {
                    $csOrd = new Orders();
                    $csOrd->setOrderID ($row["orderID"]);
                    $csOrd->setCustID($row["custID"]);
                    $csOrd->setIsCustomOrder($row["isCustomOrder"]);
                    $csOrd->setAmount($row['amount']);
                    $csOrd->setDate($row['date']);
                    $csOrd->setTransID($row['transID']);
                    $csOrd->setStatus($row['status']);                      
                    $order = $csOrd;
                    $i++; 
                }

            }
            $con->close();
            return $order;
        }catch(Exception $e) {
            echo "couldnt establish connection";
            return null; 
        }


    }

}


?>
