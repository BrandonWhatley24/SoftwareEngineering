<?php
require("Creds.php"); 
    class TransactionsDAO extends Creds{
              public function getAllTransactions(){
            
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); 
            
            $sql = "SELECT * FROM Transactions";
            $con = null;
            $pstmt = null;
            $allTrans = array();
            
            try{

                //establish connections
                $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    
                }
                //prepare statment
                $pstmt = $con->prepare($sql);
                
                //executre query
                $pstmt->execute();
                
                     //get results
                     $result = $pstmt->get_result();

                     if($result != null){
                       $i = 0;
                       while($row = $result->fetch_assoc()){
                           $csTrans = new Transactions();
                           $csTrans->setTransID($row['TransID']);
                           $csTrans->setCredit($row['Credit']);
                           $csTrans->setDate($row['Date']);
                           $csTrans->setBalance($row['Balance']);                      
                           $allTrans[$i] = $csTrans;
                           $i++;
                       }
   
                     }
                $con->close();     
                return $allTrans; 


            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return false;
            }
            


        }

        public function addTransaction($credit,$date,$balance){

            $con = null;
            $pstmt = null; 
            $sql = "INSERT INTO Transactions (Credit, Date, Balance)VALUES(?,?,?)";

            try{
                //establish connection
                $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    
                }
                 //prepare statment
                 $pstmt = $con->prepare($sql);
                  $pstmt->bind_param('dsd', $credit, $date, $balance);

                  //execute 
                  $pstmt->execute();
                  $result = $pstmt->get_result();
                
             
                $con->close();

                return true;
            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteTransaction($transID){
            $con = null;
            $pstmt = null;
            $sql = "DELETE FROM Transactions WHERE TransID =?";
            
            try{
                 //establish connection
                 $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
                 if ($con->connect_error) {
                     die("Connection failed: " . $con->connect_error);
                     
                 }

                 //prepare statment
                 $pstmt = $con->prepare($sql);
                 $pstmt->bind_param('i',$transID);

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

        public function updateTransaction($transID, $credit, $date, $balance){

            $con = null; 
            $pstmt = null; 
            $sql = "UPDATE Transactions SET Credit =?, Date =?, Balance =? WHERE TransID = ?";

            try{

                 //establish connection
                 $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
                 if ($con->connect_error) {
                     die("Connection failed: " . $con->connect_error);
                     
                 }

                 //prepare statment
                 $pstmt = $con->prepare($sql);
                 $pstmt->bind_param('dsdi',$transID,$credit,$date,$balance);

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

        public function getTransBetweenDates($beginDate,$endDate){
            $trans = array();
            $con = null; 
            $pstmt = null; 
            $sql = "SELECT * FROM Transactions WHERE Date BETWEEN ? AND ?"; 

            try{
                
                //establish connection
                $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
                // prepare statement
                $pstmt = $con->prepare($sql);
                $pstmt->bind_param("ss",$beginDate,$endDate);
                //execute
                $pstmt->execute();
                $result = $pstmt->get_result();
                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){
                        $csTrans = new Transactions();
                        $csTrans->setTransID($row['TransID']);
                        $csTrans->setCredit($row['Credit']);
                        $csTrans->setDate($row['Date']);
                        $csTrans->setBalance($row['Balance']);                      
                        $trans[$i] = $csTrans;
                        $i++;
                    }

                  }
                $con->close();

            }catch(Exception $e){
                echo "Database Connection Failed In the getAllItemDatabase from Consumer class!";
                echo $e->getMessage();
                return false;
            }
        }
    }

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