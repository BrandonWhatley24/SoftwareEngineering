<?php

require('/srv/www/htdocs/php/edu/uafs/Model/Orders.php');

class OrdersDAO {
    private $user="root";
    private $password ="Garmon22";
  

   

    public function getAllItemFromDatabase($orderID) {
        $myConsumersOrds = array();
        $sql = "SELECT * FROM ConsumerOrders;";

        $con = null;
        $pstmt = null;
        
        
        try {
            

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); 
            
            $con = new mysqli("localhost", $this->user, $this->password, "Testing");
            
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    
                }
                $pstmt = $con->prepare($sql);
               
                $pstmt->execute();
                $result = $pstmt->get_result();

                if ($result != null) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $csOrd = new ConsumerOrders();
                        $csOrd->setOrderID($row['OrderID']);
                        $csOrd->setStatus($row['Status']);
                        $csOrd->setAmount($row['Amount']);
                        $csOrd->setDate($row['Date']);                      
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

}
?>
