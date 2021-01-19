<?php
require_once('./dao/DAO_Customer.php');

if(isset($_GET['action'])){
    if($_GET['action'] == "delete"){
        if(isset($_POST['firstName']) && isset($_POST['lastName'])){
        
        if(is_numeric($_POST['firstName']) &&
                $_POST['lastName'] != ""{    
               
                $DAO_Customer = new DAO_Customer();
                $result = $DAO_Customer->deleteCustomer($_POST['firstName'], 
                        $_POST['lastName']);
                
    if($_GET['action'] == "delete"){
        if(isset($_GET['firstName']) && is_numeric($_GET['firstName'])){
            $DAO_Customer = new DAO_Customer();
            $success = $DAO_Customer->deleteCustomer($_GET['firstName']);
            echo $success;
            if($success){
                header('Location:contact.php?deleted=true');
            } else {
                header('Location:contact.php?deleted=false');
            }
        }
    }
                if($result > 0){
  
                    header('Location:delete.php?firstName=' . $_POST['firstName']);
                }
            } else {
                header('Location:delete.php?missingFields=true&firstName=' . $_POST['firstName']);
            }
        } else {
            header('Location:delete.php?error=true&firstName=' . $_POST['firstName']);
        }
    }
    

}
?>
