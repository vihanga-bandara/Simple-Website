<?php
session_start();
include("db.php");
include("headfile.html");
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
$check=false;
	$email=$_POST['email'];
  if (empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["dob"]) || empty($_POST["username"]) || empty($_POST["pw"]) || empty($_POST["confirmpw"]) || empty($_POST["email"])) {

    echo "All fields are compulsory<br>";
    echo "Go back to <a href=Register.php>Register</a>";
    $check=true;
      } else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) 
      {
  echo "Email not valid";
  echo "<br>Go back to <a href=Register.php>Register</a>";
  $check=true;

	}
      


if((isset($_POST['submit_register'])) && $check=false ){
$Fname=$_POST['first_name'];
$Lname=$_POST['last_name'];
$dob=$_POST['dob'];
$username=$_POST['username'];
$pw=$_POST['pw'];
$confirmpw=$_POST['confirmpw'];




if(($pw==$confirmpw)){
$prodSQL="INSERT INTO users(userName,pw,userFName,userLName,dateOfBirth,email) VALUES ('$username','$pw','$Fname','$Lname','$dob','$email')";

$exeprodSQL=mysql_query($prodSQL);

if ((mysql_errno($conn))==0){
echo "You have successfully registered in the system!<br>To continue, please <a href=Login.php>login</a>";
} 
else if ((mysql_errno($conn))==1062){
	echo "There is an error with your registration<br>The email you entered already exists<br>Go back to <a href=Register.php>Register</a>";
	
	
} else {
	echo "The database seems to be down for the moment. Please try again in a few minutes";
	
}
}	
 else {
	echo "The two passwords that you entered do not match <br> Please make sure you enter them correctly <br> Go back to <a href=Register.php>Register</a>";
}
}
//include head layout
include("footfile.html");
?>
