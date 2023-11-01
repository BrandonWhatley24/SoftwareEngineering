<?php
require('/srv/www/htdocs/php/edu/uafs/Model/CustomOrderDetails.php');
    class CustomOrderDetailsDAO{

        private $userName = "admin";
        private $password ="mypass1"; 

        public function getAllCustomOrderDetails(){
            $allCustomOrderDetails = array(); 
            $con = null;
            $pstmt = null; 
            $sql = "SELECT * FROM Custom_Order_Details";
            
            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");

                //prepare statment
                $pstmt = $con->prepare($sql);
                $pstmt ->execute();
                //Result set
                $result = $pstmt->get_result();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){

                        $customOrder = new CustomOrderDetails();
                        $customOrder->setCustOrderDetailID($row["custOrderDetailID"]);
                        $customOrder->setItemId($row["ItemID"]);
                        $customOrder->setOrderDescription($row["OrderDescription"]);
                        $customOrder->setOrderID($row["orderID"]);
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
            $sql = "SELECT * FROM Custom_Order_Details WHERE OrderID = @OrderID";
            $allCustomOrderDetails = array();
            
            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");

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
                        $customOrder->setCustOrderDetailID($row["custOrderDetailID"]);
                        $customOrder->setItemID($row["ItemID"]);
                        $customOrder->setOrderDescription($row["OrderDescription"]);
                        $customOrder->setOrderID($row["OrderID"]);
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
            $sql = "INSERT INTO Custom_Order_Details(ItemID, OrderDescription, OrderID)VALUES(?,?,?)";

            try{
                
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");

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
            $sql = "DELETE FROM Custom_Order_Details WHERE CustOrderDetailID =?";

            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");
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
            $sql = "UPDATE Custom_Order_Details SET ItemID =?,OrderDescription =?,OrderID =? WHERE CustOrderDetailID =?";
            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");
                
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
            $sql = "DELETE FROM Custom_Order_Details WHERE OrderID = ?";

            try{
                //establish connection
                $con = new mysqli("localhost", $this->userName,$this->password,"Testing");
                
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

?>
