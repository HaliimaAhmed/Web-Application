<?php
include ('./header.php');
require_once('./dao/DAO_Customer.php');
require_once('./websiteUser.php');

session_start();
session_regenerate_id(false);

if(isset($_SESSION['AdminID'])){
   if(!$_SESSION['websiteUser']->isAuthenticated()){
      header('Location:login.php'); 
    }
} else {
    header('Location:login.php');
}


 
$DAO_Customer = new DAO_Customer;
$customers=$DAO_Customer->getCustomers();

echo '<div>'.'Session AdminID: ' . $_SESSION['AdminID'].'</div>';
if($_SESSION['websiteUser']->getDate()!=null){
echo '<div>'.'Last login date: ' . $_SESSION['websiteUser']->getDate().'</div>';
}else{
echo '<div>'.'The first time to log in' .'</div>';  
}
echo("<button onclick=\"location.href='logout.php'\">Logout!</button>");
			
			mysqli_report(MYSQLI_REPORT_STRICT);
			$connect = mysqli_connect("localhost", "wp_eatery", "password", "wp_eatery") or die('Error: ' . mysqli_error($link));
			$query = "SELECT * FROM mailinglist" ;
			$log = $connect->query($query) or die('Error: ' . mysqli_error($conect));
            echo '<table style=\"text-align:center;\" border="2">';
            
			echo "<tr><th style=\"width:100px;\">Customer Name</th><th style=\"width:150px;\">Phone Number</th><th style=\"width:250px;\"><center>Email Address</center></th><th style=\"width:100px;\"><center>Referrer</center></th></tr>";
			while ($row = mysqli_fetch_array($log)) 
			{
            echo '<tr>';
            echo '<td style="text-align:center">' . $row['customerName'] . '</td>';
            echo '<td style="text-align:center">' . $row['phoneNumber'] . '</td>';
            echo '<td style="word-break:break-all; text-align:center;">' . $row['emailAddress'] .'</td>';
            echo '<td style="text-align:center">' . $row['referrer'] .'</td>';
            echo '</tr>';

			}
			echo "</table>";
			mysqli_close($connect);

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