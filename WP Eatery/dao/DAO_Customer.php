<?php

require_once ('DAO_Abstract.php');
require_once ('./model/customer.php');

 class DAO_Customer extends DAO_Abstract {
    
    function __construct() {
        try{
             parent::__construct() ;
        } catch (mysqli_sql_exception $e){
            throw $e;
        }        
    }
 
   public function getCustomers(){
    $result = $this->mysqli->query('SELECT * FROM mailinglist');
    $customers = array();
    
    if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
            $customer = new customer($row['customerName'],$row['phoneNumber'],$row['emailAddress'],$row['referrer']);
            $customers[] = $customer;
        }
        $result->free();
        return $customers;
    }
    
        $result->free();
        return false;    
   }
   
   
   public function getID(){
      $result = $this->mysqli->query('SELECT * FROM mailinglist');
      $ID = array();
      
      if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
           $id=$row['_id'];
           $ID[]=$id;
        }           
        $result->free();
        return $ID;
    }
        $result->free();
        return false;
   }
 
   
   public function getCustomer($id){
    $query = 'SELECT * FROM mailinglist WHERE _id = ?';
    $stmt = $this->mysqli->prepare($query);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stem->get_result();
    if($result->num_rows == 1){
        $temp = $result->fetch_assoc();
        $customer = new customer($temp['customerName'],$temo['phoneNumber'],$temp['emailAddress'],$temp['referrer']);
        $result->free();
        return $customer;
    }
        $result->free();
        return false;   
   }
   
   
   
   public function addCustomer($customer){
    if(!$this->mysqli->connect_errno){
      $query = 'INSERT INTO mailinglist (customerName,phoneNumber,emailAddress,referrer) values (?,?,?,?)';
      $stmt = $this->mysqli->prepare($query);
      $name=$customer->getName();
      $phone=$customer->getPhone();
      $email=$customer->getEmail();
      $ref=$customer->getReferrer();
      $stmt->bind_param('ssss',$name,$phone,$email,$ref);
      $stmt->execute();
      if($stmt->error){
          return $stmt->error;
      }else {
        echo "<script type='text/javascript'>alert(\"Submit Successfully!\")</script>";
        header("location:mailing_list.php");
      }
    }else{
      return 'Could not connect to Database.';
    }
 }
   
   
   public function duplicateEmail($emailAddress){     
      if(!$this->mysqli->connect_errno){
         $result = $this->mysqli->query('SELECT emailAddress FROM mailinglist');
         $email = array();   
         if($result->num_rows >= 0){
            while( $row = $result->fetch_assoc()){
               $email[] = $row['emailAddress'];
            }
            $result->free();
         }
        foreach( $email as $value){
          $hash = $value;
          if(password_verify($emailAddress,$hash)){
            return true;
          } 
        }
          return false;
       }
       return false;
   }
       public function deleteCustomer($customerName){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM mailinglist WHERE customerName = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $customerName);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

 
 
 }