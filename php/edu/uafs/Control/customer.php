<?php
require("Creds.php"); 
class CustomerDAO extends Creds{

    public function isNewCustomer($email,$username){
        
        $con = null;
        $pstmt = null; 
        $sql = "SELECT lname FROM customers WHERE email=? OR password=?";
        ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); 
        $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
       
        $pstmt = $con->prepare($sql);
        $pstmt->bind_param("ss",$email,$username);
        $pstmt->execute();

        $result = $pstmt->get_result();

        if($result->num_rows > 0){
            $con->close();
            return false;
        }
        $con->close();
        return true;
       
    }

    // Create a new record
   
    public function addCustomer($fname,$lname,$username,$password,$email) {
        try {

            $sql = "INSERT INTO customers(fname,lname,username,password,email)VALUES(?,?,?,MD5(?),?)";
            $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());
            $pstmt = $con->prepare($sql);
             $pstmt->bind_param("sssss",$fname,$lname,$username,$password,$email);
            $pstmt->execute();
            $con->close();
            return true;
            
        }catch(Exception $e) {
            echo "Database connection failed when adding customer.";
            echo $e->getMessage();
            return false;
        }
    }

    public function loginAuth($username,$password) {
        
        $con = null;
        $pstmt = null; 
        $sql = "SELECT lname FROM customers WHERE username =? AND password=MD5(?)";

        //establish connection 
        $con = new mysqli($this->getHost(),$this->getUsername(),$this->getPassword(),$this->getDbname());

        //prepare statement
        $pstmt = $con->prepare($sql);
        $pstmt->bind_param("ss",$username,$password);
        $pstmt->execute();
        $result = $pstmt->get_result();
        
        if( $result->num_rows > 0){
            $con->close();
            return $username;
        }
        $con->close();
        return null;         
    }

 /*

    // Retrieve a record by ID
    
    public function getById($id) {
        $sql = "SELECT * FROM customers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            // Create and return a YourEntity object from the result
            return new Customer($result);
        } else {
            return null;
        }
    }
 
    // Update a record
    public function update(Customer $entity) {
        $sql = "UPDATE customers SET Fname = :value1, Lname = :value2, username = :value3, password = :value4, email = :value5 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':value1', $entity->getFname());
        $stmt->bindValue(':value2', $entity->getLname());
        $stmt->bindValue(':value3', $entity->getusername());
        $stmt->bindValue(':value4', $entity->getpassword());
        $stmt->bindValue(':value5', $entity->getemail());
        // Bind more parameters as needed
        $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM customers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
       */
}
class Customer {
    private $id;
    private $Lname;
    private $Fname;
    private $username;
    private $password;
    private $email;

    public function __construct($id, $Lname, $Fname,$username,$password,$email) {
        $this->id = $id;
        $this->Lname = $Lname;
        $this->Fname = $Fname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getLname() {
        return $this->Lname;
    }

    public function getFname() {
        return $this->Fname;
    }
    public function getpassword() {
        return $this->password;
    }
    public function getusername() {
        return $this->username;
    }
    public function getemail() {
        return $this->email;
    }

    // You can also add setter methods if needed

    public function setLname($Lname) {
        $this->Lname = $Lname;
    }

    public function setFname($Fname) {
        $this->Fname = $Fname;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    // Additional methods for your entity can be added here
}
?>
