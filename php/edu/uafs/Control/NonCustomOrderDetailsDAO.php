<?php
require('/srv/www/htdocs/php/edu/uafs/Model/NonCustomOrderDetails.php');
    class NonCustomOrderDetailsDAO{

       private $userName = "admin"; 
       private $password = "mypass1";


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
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");

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
                        $order->setOrderDetailID ($row["id"]);
                        $order->setItemID ($row["ItemID"]);
                        $order->setOrderDescription ($row["OrderDescription"]);
                        $order->setOrderID($row["orderID"]);
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
            $sql = "SELECT * FROM non_custom_order_details WHERE OrderID=?";

            try{
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");
                
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
                        $order->setOrderDetailID ($row["id"]);
                        $order->setItemID ($row["ItemID"]);
                        $order->setOrderDescription ($row["OrderDescription"]);
                        $order->setOrderID ($row["orderID"]);
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
            $sql = "INSERT INTO non_custom_order_details (ItemID,OrderDescription,OrderID) VALUES(?,?,?)"; 

            try{
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL); 
                //establish connection
                $con = new mysqli("localhost",$this->userName,$this->password,"Testing");

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
            $sql = "UPDATE non_custom_order_details SET ItemID=?,OrderDescription=? WHERE OrderID=?";

            try{
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL); 
                //establish connection
                $con = new mysqli('localhost',$this->userName,$this->password,'Testing');

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

?>