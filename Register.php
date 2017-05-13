<?php
session_start();
include("headfile.html");

//create a variable called $pagename which contains the actual name of the page
$pagename="Registration";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 


echo "<p></p>";
//display name of the page and some random text
echo "<br><br><br>";
?>
<style> 
input[type=text],[type=password],[type=date],[type=email],[type=submit],[type=reset] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 3px solid #555;
}
</style>
      <div align = "center">
         <div style = "width:500px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "getregister.php" method = "post">
                <table>
				<tr>
				<label for="first_name">First Name : </label>
				<input type="text" name="first_name" ><br>
				</tr>
				<tr>
				<label for="last_name">Last Name : </label>
				<input type="text" name="last_name" ><br>
				</tr>
				<tr>
				<label for="dob">Date of Birth : </label>
				 <input type="date" name="dob" ><br>
				</tr>
				<tr>
				<label for="username">Enter a username : </label>
				<input type="text" name="username" ><br>
				</tr>
				<tr>
				<label for="pw">Enter a password : </label>
				<input type="password" name="pw" ><br>
				</tr>
				<tr>
				<label for="confirmpw">Confirm your password</label>
				<input type="password" name="confirmpw" ><br>
				</tr>
				<tr>
				<label for="email">E-mail address : </label>
				<input type="email" name="email" ><br><br><br>
				</tr>
				<tr>
				<input type="submit" name='submit_register'>
				<input type="reset">
				</tr>
				</table>
				  
               </form>
               
					
            </div>
				
         </div>
			
      </div>

<?php
//include head layout
include("footfile.html");
?>
