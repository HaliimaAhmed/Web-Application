<?php
include ('./header.php');
require_once('./dao/DAO_Customer.php');

if(!isset($_GET['customerName']) || !is_numeric($_GET['customerName'])){

header("index.php");
exit;

} else{
    $DAO_Customer = new DAO_Customer();
    $Customer = $DAO_Customer->getCustomers($_GET['customerName']);
    if($Customer){
?>    
        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>delete <?php echo $Customer->getFirstName() . ' ' . $Customer->getLastName();?></title>
        <script type="text/javascript">
            function confirmDelete(customerName){
                return confirm("Do you want delete " + customerName + "?");
            }
        </script>
    </head>
    <body>
        	
        <h3>delete Customer</h3>
        <form name="deleteCustomer" method="post" action="mailing_list.php?action=edit">
            <table>
  
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="firstName" id="firstName" 
                               value="<?php echo $Customer->getFirstName();?>"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lastName" id="lastName" 
                               value="<?php echo $Customer->getLastName();?>"></td>
                </tr>
                <tr>
                    <td cospan="2"><a onclick="return confirmDelete('<?php echo $Customer->getFirstName() . ' ' . $Customer->getLastName();?>')" href="mailing_list.php?action=delete=<?php echo $Customer->getCustomers();?>">DELETE <?php echo $Customer->getFirstName() . " " . $Customer->getLastName();?></a></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update Customer"></td>
                    <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <h4><a href="index.php">go to main page</a></h4>
    </body>
</html>
<?php } else{

header("Location: index.php");
exit;
}

} ?>