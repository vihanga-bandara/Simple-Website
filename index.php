<?php
//include a db.php file to connect to database
session_start();
include ("db.php");


//create a variable called $pagename which contains the actual name of the page
$pagename="workedUp ";
//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.php");

//display name of the page and some text
echo '<div class="container text-center">
    
  
 <h2>'.$pagename.'</h2>
 <p>I love '.$pagename.'!</p>

<p> Amazing products for your home, for your work, for you! <br><br><hr>
</div>';

//create a new variable containing a SQL statement retrieving names of products from the product table 
$SQL="select prodId, prodName, prodDescrip, prodPicName, prodPrice from product";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysql_query($SQL) or die (mysql_error());

//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed. 
//loop through the array i.e while the end of the array has not been reached go through it
echo '<div class="container">    
  <div class="row">';
while ($arrayprod=mysql_fetch_array($exeSQL))
{
	echo "<br>";

//make each product a link to the next page and pass the product id to the next page by URL
//concatanate a string of characters u_prodid which carries the value of the actual id
echo "<p><a href=prodinfo.php?u_prodid=".$arrayprod['prodId'].">";
//Display name of the product


echo '<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">'.$arrayprod['prodName'].'</div>
        <div class="panel-body"><img src="images/'.$arrayprod['prodPicName'].'" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">$ '.$arrayprod['prodPrice'].'</div>
         <div class="panel-footer">'.$arrayprod['prodDescrip'].'</div>
      </div>
    </div>	';

	
}

echo  '</div>
</div><br>';

//include head layout
include ("footfile.html");
?>


