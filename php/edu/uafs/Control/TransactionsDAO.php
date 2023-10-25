<?php

    class TransactionsDAO{
        private $user="root";
        private $password ="Garmon22";
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
                $con = new mysqli("localhost", $this->user, $this->password, "Testing");
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

            }
            


        }

        public function addTransaction($credit,$date,$balance){

            $con = null;
            $pstmt = null; 
            $sql = "INSERT INTO Transactions (Credit, Date, Balance)VALUES(?,?,?)";

            try{
                //establish connection
                $con = new mysqli("localhost", $this->user, $this->password, "Testing");
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    
                }
                 //prepare statment
                 $pstmt = $con->prepare($sql);
                  $pstmt->bind_param('dsd', $credit, $date, $balance);

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

        public function deleteTransaction($transID){
            $con = null;
            $pstmt = null;
            $sql = "DELETE FROM Tranactions WHERE TransID =?";
            
            try{
                 //establish connection
                 $con = new mysqli("localhost", $this->user, $this->password, "Testing");
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
                 $con = new mysqli("localhost", $this->user, $this->password, "Testing");
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
    }

?>