<?php

    class CustomOrderDetailsDAO{

        private $userName = "root";
        private $password ="Garmon22"; 
        private $db = "test"; 
        public function getAllCustomOrderDetails(){
            $allCustomOrderDetails = array(); 
            $con = null;
            $pstmt = null; 
            $sql = "SELECT * FROM custom_Order_details";
            
            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                //prepare statment
                $pstmt = $con->prepare($sql);
                $pstmt ->execute();
                //Result set
                $result = $pstmt->get_result();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){

                        $customOrder = new CustomOrderDetails();
                        $customOrder->setCustOrderDetailID($row["custorderdetailid"]);
                        $customOrder->setItemId($row["itemid"]);
                        $customOrder->setOrderDescription($row["orderDesription"]);
                        $customOrder->setOrderID($row["orderid"]);
                        $allCustomOrderDetails[$i] = $customOrder; 

                        $i++;
                    }
                }

                //close connection
                $con->close();
                return $allCustomOrderDetails;


            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return null;
            }
        }

        public function getAllOrderDetailsByOrderId($orderId){
            $con = null;
            $pstmt = null;
            $sql = "SELECT * FROM custom_Order_details  WHERE orderid= ?";
            $allCustomOrderDetails = array();
            
            try{
                
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                //prepare statment
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("i", $orderId);

                //execute query
                $pstmt->execute();

                //resultset
                $result = $pstmt->get_result();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){
                        $customOrder = new CustomOrderDetails();
                        $customOrder->setCustOrderDetailID($row["custorderdetailid"]);
                        $customOrder->setItemID($row["itemid"]);
                        $customOrder->setOrderDescription($row["orderDesription"]);
                        $customOrder->setOrderID($row["orderid"]);
                        $allCustomOrderDetails[$i]= $customOrder;
                        $i++;
                    }
                }

                $con->close();
                return $allCustomOrderDetails;
            }catch(Exception $e){
             
            }

        }


        public function insertCustomOrderDetail($ItemID,$orderDescription,$orderID){

            $con=null;
            $pstmt=null; 
            $sql = "INSERT INTO custom_Order_details (ItemID, OrderDescription, orderID)VALUES(?,?,?)";

            try{
                
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("isi", $ItemID, $orderDescription, $orderID);
                //execute query
                $pstmt->execute();
                $con->close();
                return true; 
            }catch(Exception $e){
                
                return false; 
            }

        }

        public function deleteOrderDetails($custOrderDetailID){

            $con=null;
            $pstmt=null;
            $sql = "DELETE FROM custom_Order_details  WHERE custOrderDetailID =?";

            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);
                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("i", $custOrderDetailID); 

                //execute query
                $pstmt->execute();
                $con->close();
                return true;
            }catch(Exception $e){
                return false;
            }
        }

        public function updateOrder( $itemID,$orderDescription,$orderID,$custOrderDetailID){
            $con=null;
            $pstmt=null;
            $sql = "UPDATE custom_Order_details  SET ItemID =?,OrderDescription =?,OrderID =? WHERE CustOrderDetailID =?";
            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);
                
                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("isii",$itemID,$orderDescription, $orderID, $custOrderDetailID);

                //execute query
                $pstmt->execute();

                $con->close();
                return true; 


            }catch(Exception $e){
                return false;
            }



        }

        public function deleteOrderDetailsForOrder($orderID){

            $con=null;
            $pstmt=null;
            $sql = "DELETE FROM custom_Order_details  WHERE OrderID = ?";

            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);
                
                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("i",$orderID);

                //execute query
                $pstmt->execute();

                $con->close();

                return true; 
                
                
            }catch(Exception $e){
                return false;
            }
        }
    }

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
