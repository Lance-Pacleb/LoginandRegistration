
<?php 
  $array = array();
  $db = mysqli_connect('localhost', 'root', '','test');
  if(isset($_GET['register'])){
    $firstnameinput =$_GET['name'];
    $lastnameinput = $_GET['last'];
    $emailinput = $_GET['email'];
    $addressinput = $_GET['address'];
    $genderinput = $_GET['gender'];
    $contactnoinput = $_GET['contactno'];
    $bdayinput = $_GET['bday'];
    $passwordinputone = $_GET['pass1'];
    $passwordinputwo = $_GET['pass2'];
    $query123 = " SELECT Email FROM users " ;  
    $result5 = mysqli_query($db, $query123);
    $row1 = mysqli_fetch_assoc($result5);

    $pass =md5($passwordinputone);

    $sql = "INSERT INTO users (Firstname,Lastname,Email,Address,Contact,Gender,Birthday,FirstPassword,SecondPassword)
            VALUES('$firstnameinput','$lastnameinput','$emailinput','$addressinput','$contactnoinput',
                   '$genderinput','$bdayinput','$passwordinputone','$passwordinputwo')";
    $result = mysqli_query($db,$sql);
              if($result){
                  if($passwordinputone != $passwordinputwo){
                      $array[] = "Password not Match!";}
                        else{
                            $_SESSION['name']= $firstnameinput;
                              header('location:order.php'); } }
              else{ echo "insert data fail"; } } 
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="css/cssdecoration.css">
          <link rel="stylesheet" type="text/css" href="css/registercss.css">
            </head>
            <body >
	         <center>
		      <div id="navbar">
			   <a href="" id="linker">Help</a>
        <a href="" id="linker">About Us?</a>
			<a href="mainpage.php" ><button class="signbtn" >Home</button></a>
		</div>
	</center>
	<div class="">
		  <div class="holder2">
			   <div class="registration"">
						  <form clas="" action="registerform.php" method="get">
                <label style="font-size: 30px;"> <center>Sign Up</center></label>
                 <div ><?php 
                   if($array){
                      foreach ($array as $key => $value){echo '<div><i style="color:red;">'.$value.'</i></div><br>';}} ?>
                        </div> <br>
                            <label style="float: left; margin-left: 45px">First Name:</label><label>Last Name:</label><br>
          							       <input type="text" name="name" id="box" required placeholder="Enter your First Name">
          							          <input type="text" name="last" id="box" required placeholder="Enter your Last Name">
                                    <label style="float: left; margin-left: 45px">Address:</label><label><br>Email:</label><br>
          							               <input type="text" name="address" id="box" required placeholder="Enter your Address">
            						                  <input type="email" name="email" required placeholder="Enter your email">
                                            <label style="float: left; margin-left: 45px">Password:</label><br><label></label><br>
            						                   <input type="Password" name="pass1" id="box" required placeholder="Enter your Password">
              						               <input type="Password" name="pass2" id="box" placeholder="Re-Enter your Password"><br>
            							             <label>Birthday:</label>
            							           <input type="date" name="bday" id="box" required><br>
            							         <label >ContactNo:</label>
            							       <input type="number" name="contactno" id="box" required placeholder="Enter your contact no." ><br>
            						       <label>Gender:</label>
            		            <input type="radio" name="gender" value="male"> Male
              		        <input type="radio" name="gender" value="female"> Female
              	       <input type="radio" name="gender" value="other"> Other<br><br>
            	       <input type="submit" value="Register" class="registerbtn" name="register"><br>
        		      <label>I have already an account  
                </label><a href="loginform.php" style="color: red; font-style: italic;">Log in!</a>
    			   </form>
    	     </div>
        </div>
	   </div>
  </body>

</html>