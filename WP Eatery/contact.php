<?php
include ('./header.php');
require_once('./dao/DAO_Customer.php');
?>

<?php

   try{
     $DAO_Customer = new DAO_Customer;
     $errorexists = false;
     $error1 = Array();
    
      if(isset($_POST['customerName'])||
         isset($_POST['phoneNumber'])||
         isset($_POST['emailAddress'])||
         isset($_POST['referral'])){
        
        if($_POST['customerName']==""){
            $errorexists = true;
            $error1['customerName'] = "Please enter a name";
        }
        
        if (empty($_POST["phoneNumber"])){
            $errorexists = true;
            $error1['phoneNumber'] = "Please enter a phone number";
        }
        
        if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $_POST ['phoneNumber']) ){
            $errorexists = true;
            $error1['phoneNumber'] = "Please enter a valid phone number format 111-111-1111, ";
        }                
       
        if (empty ( $_POST ['emailAddress'] ) || (! filter_var ( $_POST ['emailAddress'], FILTER_VALIDATE_EMAIL ))){
            $errorexists = true;
            $error1['emailAddress'] = "Please enter an email address";
        }
       
        
      
        if($DAO_Customer->duplicateEmail($_POST['emailAddress'])){
            $errorexists = true;
            $error1['emailAddress'] = "Duplicate Email Address not allowed";
        }


        if (empty($_POST["referral"])) {
            $errorexists = true;
            $error1['referral'] = "A referral is required";
        }
        

               
        if(!$errorexists){
            $email = $_POST['emailAddress'];
            $customer = new customer($_POST['customerName'],$_POST['phoneNumber'],$email,$_POST['referral']);
            $addSuccess = $DAO_Customer->addCustomer($customer);
            echo '<h3>'. $addSuccess .'</h3>';
            

        }
    }
    
    
?>
              
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'>
                                <?php 
                                if(isset($error1['customerName'])){
                                    echo '<span style=\'color:red\'>'.$error1['customerName'].'</span>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40' value='<?php
                                if(isset($_POST['phoneNumber'])){
                                 echo $_POST['phoneNumber'];
                                }
                                ?>'>
                                <?php 
                                if(isset($error1['phoneNumber'])){
                                    echo '<span style=\'color:red\'>'.$error1['phoneNumber'].'</span>';
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'><?php 
                                if(isset($error1['emailAddress'])){
                                    echo '<span style=\'color:red\'>'.$error1['emailAddress'].'</span>';
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'>
                                    <?php 
                                if(isset($error1['referral'])){
                        echo '<span style=\'color:red\'>' . $error1['referral'] . '</span>';
                      }
            ?></td>
                            </tr>                            
                            
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                                                             
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
<?php
      
   
    }catch(Exception $e){
            echo '<h3>Error on page.</h3>';
            echo '<p>' . $e->getMessage() . '</p>';            
        }
   
            ?>
           <?php include './footer.php' ?>
 
