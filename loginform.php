<?php 
session_start();
$array = array();
$host ="localhost";
$user = "root";
$password = "";
$db1 ="test";
$db = mysqli_connect('localhost', 'root', '','test');
mysql_connect($host,$user,$password);
mysql_select_db($db1);
  if(isset($_POST['login']))
     {
      $unameinput = $_POST['uname'];
      $passwordinput = $_POST['psw'];


      $sql = " SELECT * FROM  users WHERE Email='".$unameinput."'AND FirstPassword='".$passwordinput."'limit 1 ";
      $result = mysql_query($sql);

      $query123 = "SELECT * FROM users where Email = '".$unameinput." '" ;
      $result5 = mysqli_query($db, $query123);
      $row1 = mysqli_fetch_assoc($result5);
      if(mysql_num_rows($result)==1){
            $_SESSION["username"] = $row1["Firstname"];
           $_SESSION['userid']= $row1['id'];
          header('Location: order.php');}
      else{$array[] ="Input is incorrect!";}
      }
?>
<!DOCTYPE html>
  <html>
    <head>
    <title>Log in</title>
  <link rel="stylesheet" type="text/css" href="css/cssdecoration.css">
<link rel="stylesheet" type="text/css" href="css/logincss.css">
  </head>
    <body >
      <div id="navbar">
        <a href="" id="linker">Help</a>
          <a href="" id="linker">About Us?</a>
            <a href="mainpage.php"><button class="signbtn">Home</button></a></div>
              <div id="data">
                <div class="move">
                	<div class="modal">
                		<h2>Log in</h2>
                  		<form class="modal-content" action="loginform.php" method="POST">
                			  <div class="container">
                          <div> <?php 
                            if($array){
                              foreach ($array as $key => $value){
                                echo ' <div><i style="color:red;"> <center>'.$value. '</center></i> <br></div>';}} ?>
                                  </div>
                      						  <label for="uname"><b>Email</b></label>
                      						    <input type="email" placeholder="Enter Email" name="uname" required>
                      						      <label for="psw"><b>Password</b></label>
                      						    <input type="password" placeholder="Enter Password" name="psw" required>
                      						<label><a href="registerform.php" style="color: black; display: ;">Create a new account </a></label><br>
                   			 <input  name="login" type="submit" class="loginbtn" value="LogIn">
                       <a href="mainpage.php"><button type="button" class="cancelbtn">Cancel</button></a>
                		</div>
                 </form>
              </div>
           </div>
        </div>
</body>
</html>