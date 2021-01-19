<?php
require_once('websiteUser.php');
session_start();
   
   if(isset($_SESSION['AdminID'])){
        if($_SESSION['websiteUser']->isAuthenticated()){
           session_write_close();
           header('Location:mailing_list.php');
        }
    }
    
    $missingfield = false;
    if(isset($_POST['submit'])){
        if(isset($_POST['username'])&&isset($_POST['password'])){
            if($_POST['password']==''||$_POST['username']==''){
                $missingfield = true;
            }else{
                $websiteUser = new websiteUser();
                if(!$websiteUser->hasDbError()){
                    $username = stripslashes(addslashes($_POST['username']));
                    $password = $_POST['password'];
                    
                    $websiteUser->authenticate($username, $password);
                    if ($websiteUser->isAuthenticated()){
                        $_SESSION['AdminID'] = $websiteUser->getID();
                        $_SESSION['websiteUser']= $websiteUser;
                        header('Location:mailing_list.php');
                    }
                }
            }
        }       
    }   
 ?>   
    
<?php include ('header.php'); ?>

  <?php
      if($missingfield){
          echo '<h3 style="color:red;">Please enter both a username and a password</h3>';
      }
      if(isset($websiteUser)){
          if(!$websiteUser->isAuthenticated()){
               echo '<h3 style="color:red;">Login failed. try again.</h3>';
          }
      }
  ?>
     <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Login"></td>
                <td><input type="reset" name="reset" id="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
 <?php include ('footer.php'); ?>   