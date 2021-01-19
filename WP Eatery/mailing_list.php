<?php
include ('./header.php');
require_once('./dao/DAO_Customer.php');

 
$DAO_Customer = new DAO_Customer;
$customers=$DAO_Customer->getCustomers();


if ($customers){

    echo '<h3>'.'<span style=\'color:red\'>'.'You have been entered into the mailing list!'.'</span>'.'</h3>';
    
    echo '<table width="100%" height="100%" border="2">';
                echo '<tr><th>Customer</th> <th>Phone</th> <th>Email Address</th> <th>Referral</th></tr>';
                $ID = $DAO_Customer->getID();               
                $i=0;
                foreach($customers as $customer){
                    echo '<tr>';
            
                    echo '<td>' . $customer->getName() . '</td>';
                    echo '<td>' . $customer->getPhone() . '</td>';
                    echo '<td>' . $customer->getEmail() . '</td>';
                    echo '<td>' . $customer->getReferrer() . '</td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</table>';
}else {
    echo '<h3>'.'No mailing exist now'.'</h3>';

}

?>
 <form>
   <td colspan="3">
                    <input type='submit' name='btnSubmit' id='btnSubmit' value='Delete'>&nbsp;&nbsp;
                    <input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                </td>
            </tr>
        </table>
    </form>


<?php include './footer.php' ?>