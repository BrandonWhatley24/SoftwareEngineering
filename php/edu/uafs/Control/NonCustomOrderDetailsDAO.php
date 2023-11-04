<?php

    class NonCustomOrderDetailsDAO{

        private $userName = "root";
        private $password ="Garmon22"; 
        private $db = "test"; 



        public function getAllNonCustomOrders(){
            $allNonCustomOrders = array();
            $con = null;
            $pstmt = null; 
            $sql = "SELECT * FROM non_custom_order_details";
            
            try{
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL); 
              
                //establish connections
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                //prepare statement
                $pstmt = $con->prepare($sql);
                
                //execute query
                $pstmt->execute();
                //ResultSet
                $result = $pstmt->get_result();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){
                        $order = new NonCustomOrderDetails();
                        $order->setOrderDetailID ($row["orderdetailid"]);
                        $order->setItemID ($row["itemid"]);
                        $order->setOrderDescription ($row["orderDescription"]);
                        $order->setOrderID($row["orderid"]);
                        $allNonCustomOrders[$i] = $order;
                        $i++;
                    }
                }
                $con->close();
                return $allNonCustomOrders;

                


            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return null;
            }

        }

        public function getNonCustomOrdersBasedOnOrderID($orderID){
            
            $allOrders = array();
            $pstmt = null;
            $con = null;
            $sql = "SELECT * FROM non_custom_order_details WHERE orderid=?";

            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);
                
                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("i", $orderID);

                //execute query
                $pstmt->execute();

                //resultSet
                $result = $pstmt->get_result();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){
                        $order = new NonCustomOrderDetails();
                        $order->setOrderDetailID ($row["orderdetailid"]);
                        $order->setItemID ($row["itemid"]);
                        $order->setOrderDescription ($row["orderDescription"]);
                        $order->setOrderID ($row["orderid"]);
                        $allOrders[$i]= $order;
                        $i++;
                    }
                }

                $con->close();
                return $allOrders;

            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return null;
            }
        }

        public function addNonCustomOrderDetails($ItemID,$orderDescription,$orderID){
            $con =null;
            $pstmt = null; 
            $sql = "INSERT INTO non_custom_Order_details (ItemID,OrderDescription,OrderID) VALUES(?,?,?)"; 

            try{
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL); 
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                // prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("isi", $ItemID, $orderDescription, $orderID);
                
                //execute
                $pstmt->execute();

                //close connection
                $con->close();
                return true; 
            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return false;
            }
        }

        public function editNonCustomOrderDetails($ItemID,$orderDescription,$orderID){
            $con=null;
            $pstmt =null;
            $sql = "UPDATE non_custom_Order_details SET ItemID=?,OrderDescription=? WHERE orderID=?";

            try{
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL); 
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,$this->db);

                //prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param('isi',$ItemID,$orderDescription, $orderID);

                //execute
                $pstmt->execute();

                $con->close();
                return true;

            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return false;
            }
        }

    }
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