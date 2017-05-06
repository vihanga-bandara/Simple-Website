<?php

include("headfile.html");
//create a variable called $pagename which contains the actual name of the page
$pagename="Login";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
?>
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "getlogin.php" method = "post">
                  <label>Email  :    &nbsp &nbsp&nbsp  </label><input type = "email" name = "email" class = "box"/><br /><br />
                  <label>Password  :  </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Login" name ="submit"/>&nbsp &nbsp<input type="reset" value="Clear" name="clear" />&nbsp &nbsp <br><br> <a style="font-weight:bolder;"href="index.php">Go back to Home Page</a><br />
				  
               </form>
               
					
            </div>
				
         </div>
			
      </div>
<?php
include("footfile.html");
//include head layout

?>
