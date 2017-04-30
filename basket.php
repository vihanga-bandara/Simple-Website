<?php
session_start();
include("db.php");
include("detectlogin.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title


echo "<title>".$pagename."</title>";
$total=0;
if(isset($_POST['addprod'])){
	
$newprodid=$_POST['h_prodid'];
$reququantity=$_POST['quantity'];
$_SESSION['basket'][$newprodid]=array($newprodid=>$reququantity);
$check='';



}
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
if(isset($check)){
echo "Your basket has been updated";
}
else
{
	echo "Existing Basket is shown below";
}

echo "<br><br>";

if((isset($_SESSION['basket']))){
echo "
<table>
	<tr>
		<th><b>Product Name</b></th>
		<th><b>Price</b></th> 
		<th><b>Quantity</b></th>
		<th></th>
		<th><b>Subtotal</b></th>
	</tr> 
	<tr>" ;


	foreach($_SESSION['basket'] as $array){
		foreach($array as $pd=>$rq){

			if($pd>0){
		$subtotal=0;
		$prodSQL="Select prodId, prodName, prodPrice, prodPicName, prodQuantity from product where prodId=$pd";
		$exeprodSQL=mysql_query($prodSQL);
		$thearrayprod=mysql_fetch_array($exeprodSQL);
		$prodName=$thearrayprod['prodName'];
		$prodPrice=$thearrayprod['prodPrice'];
		$prodPicName=$thearrayprod['prodPicName'];
		$subtotal=$prodPrice*$rq;
		$total=$total+$subtotal;
		echo"<tr>
							<td>$prodName</td>
							<td>GBP $prodPrice</td>
							<td>$rq</td>
							<td><img src='images/$prodPicName' height='100px' width='100px'></td>
							<td>GBP $subtotal</td>
			</tr>";
			}
	 }
	}
	
echo "
<tr>
<td colspan=4>Total</td>
<td>GBP $total</td>
</tr>";
echo "</table>";
echo "<br><a href=clearbasket.php><input type=button name='clear_session' value='Clear Basket'></a>";
} else {
	echo "<b><i>Your Basket is Empty</i></b>";
	echo "<br><br>";
	echo "
<table>
	<tr>
		<th><b>Product Name</b></th>
		<th><b>Price</b></th> 
		<th><b>Quantity</b></th>
		<th></th>
		<th><b>Subtotal</b></th>
	</tr> 
			<tr>
<td colspan=4>Total</td>
<td>$total</td>
</tr>";
echo "</table>";

echo "<br><a href=clearbasket.php><input type=button name='clear_session' value='Clear Basket'></a>";


}
if(isset($_SESSION['c_userid']['userId'])){
	echo "<br><br>To finalise your order <a href=checkout.php><input type=button name='register' value='Checkout'></a>";

} else{
echo "<br><br>New workedUp Customers <a href=Register.php><input type=button name='register' value='REGISTER'></a>";
echo "<br>Registered workedUp Members <a href=Login.php><input type=button name='login' value='LOGIN'></a>";

}
//include head layout
include("footfile.html");
?>
