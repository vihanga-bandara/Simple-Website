<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Login Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

$check1=false;

	$email=$_POST['email'];
	$password=$_POST['password'];

  if (empty($_POST['password']) || empty($_POST['email'])) {

    echo "Invalid Credentials<br>";
    echo "Go back to <a href=Login.php>Login</a>";

    $check1=true;
    
      } else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) 
      {
  echo "Sorry the email you entered is not valid";
  echo "<br>Go back to <a href=Login.php>Login</a>";
  $check1=true;
  

	} else {

		$SQL="Select userId, userName, pw, userFName, userLName, email from users where email='$email'";
		
		$exeSQL=mysql_query($SQL);
		$fetcharr=mysql_fetch_array($exeSQL);

			
	}
if(isset($fetcharr['userId'])){
	if((($fetcharr["email"])!=($email)) && (!$check1)){
				echo "Invalid Credentials<br>";
    			echo "Go back to <a href=Login.php>Login</a>";
  			 
			} else if((($fetcharr['pw'])!=($password)) && (!$check1)){
				echo "Invalid Credentials<br>";
    			echo "Go back to <a href=Login.php>Login</a>";
  			  
			} else if(!$check1) {
				$_SESSION['c_userid']['userId']=$fetcharr["userId"];
				$_SESSION['c_userid']['userName']=$fetcharr["userName"];
				$_SESSION['c_userid']['userFName']=$fetcharr["userFName"];
				$_SESSION['c_userid']['userLName']=$fetcharr["userLName"];
				echo "<b>Hello ".$_SESSION['c_userid']['userFName']." ".$_SESSION['c_userid']['userLName']."</b>";
				echo "<br>You Successfully logged in to the system<br>";
				echo "The email you entered is ".$fetcharr['email']."<br>";
				echo "The password you entered is a secret<br>";
    			echo "<br>To continue shopping <a href=index.php>Home</a>";
    			echo "<br>To view your <a href=index.php>My Basket</a>";
  			  	
			} 
}



//include head layout
include("footfile.html");
?>
