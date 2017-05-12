<?php
session_start();
include("db.php");


//create a variable called $pagename which contains the actual name of the page
$pagename="Product Information";
$prodid=$_GET['u_prodid'];
$prodSQL="select prodId, prodName, prodPicName,prodDescrip, prodPrice, prodQuantity from product where prodId=".$prodid;
$exeprodSQL=mysql_query($prodSQL) or die(mysql_error());
$thearrayprod=mysql_fetch_array($exeprodSQL);

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>"; 

//include head layout 
include ("headfile.html");
include("detectlogin.php");
echo "<p></p>";
//display name of the page and some random text
echo "<h2><center>".$pagename."</center></h2>";
echo "<br><br>";
echo ($thearrayprod['prodName']);
echo "<br><br>";
echo '<img src="images/'.$thearrayprod['prodPicName'].'" border="0" />';
echo "<br><br><br>";

echo "Price : "."$".$thearrayprod['prodPrice'];
echo "<br><br><br>";
echo $thearrayprod['prodDescrip'];
echo "<br><br>";

//display form made of one text box and one button for user to enter quantity
//pass the product id to the next page basket.php as a hidden value
echo "<form action=basket.php method=post>";
echo "Number in stock : ".$thearrayprod['prodQuantity'];
echo "<br><br>";
echo "Enter Required Quantity : ";
echo "<select name='quantity'>";
for($i=1;$i<6;$i++){
 echo "<option value=".$i.">".$i."</option>";
}
   
"</select>";
echo "<input type=submit name='addprod' value='Add to Basket'>";
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</center>";
echo "<br><br><br>";

//include head layout
include("footfile.html");
?>
