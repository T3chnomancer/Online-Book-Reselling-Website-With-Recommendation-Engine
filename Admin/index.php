<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');


if(isset($_GET["logout"]))
		{
unset($_SESSION['aidid']);
unset($_SESSION['aidname']);
unset($_SESSION['aidmail']);
		}


if(isset($_POST["submit_subscribe"]))
		{
		$en=$_POST["email"];
		$ep=$_POST["pass"];
		$result=mysql_query("select * From admin where Aemail  ='$en' and Apwd ='$ep'");
	
	while($row=mysql_fetch_array($result))
		{	
$_SESSION['aidid'] = $row[0];
$_SESSION['aidname']= $row[1];
$_SESSION['aidmail']=$row[2];
		}
			
			if($_SESSION['aidid']!="" and $_SESSION['aidname']!="")
			{
			}
			else
			{
			echo "<script>alert(\"Login Fail Plz Check Email And Password.\");</script>";
			}
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bookshop System</title>
<meta name="keywords" content="blue office, free templates, website templates, CSS, HTML" />
<meta name="description" content="Blue Office is a free website template provided by tooplate.com" />
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />

</head>
<body class="subpage">
<div id="tooplate_wrapper">
	<div id ="body">

	<div id="tooplate_sidebar">
		<div id="site_title"><a rel="nofollow"><span>Bookshop</span></a></div> <!-- end of site_title -->
      
<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			if($_SESSION['aidid']!="" and $_SESSION['aidname']=!"")
			{
?>
	<div class="sidebar_box">
<a rel="nofollow" href="index.php?logout=2">[Log Out]</a>
            <div class="cleaner"></div>
        </div>

	<div class="left_content">
      <div class="title_box">Login Users</div>
      <ul class="left_menu">
        <li class="even"><a href="index.php?page=2">Customers</a></li>
      </ul>
      
	  <div class="title_box">Books</div>
      <ul class="left_menu">
		<li class="even"><a href="index.php?page=3">Books List </a></li>
	  </ul>
	 <div class="title_box">Books Order</div><ul class="left_menu">
		<li class="even"><a href="index.php?page=5">Order Books</a></li>
		<li class="even"><a href="index.php?page=6">Books Order Completed</a></li>
        <li class="even"><a href="index.php?page=7">Book Order Details</a></li>
      </ul>
      <div class="title_box">Admin</div>
      <ul class="left_menu">
		<li class="even"><a href="index.php?page=8">Admin Details</a></li>
      </ul>


    </div>

<?php
			}
			else
			{
?>
<link rel="stylesheet" href="./bv.validation.css" type="text/css">
<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./bv.validation.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   $("#Form1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   $("#Editbox1").validate(
   {
      required: true,
      type: 'email',
      color_text: '#A52A00',
      color_hint: '#E1E1E1',
      color_error: '#E1E1E1',
      color_border: '#E1E1E1',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: 0,
      offsety: 0,
      bubble_class: 'bubbleleft',
      effect: 'none',
      error_text: 'Enter Valid Email'
   });
   $("#Editbox2").validate(
   {
      required: true,
      type: 'text',
      length_min: '3',
      length_max: '10',
      color_text: '#8B0000',
      color_hint: '#E1E1E1',
      color_error: '#E1E1E1',
      color_border: '#E1E1E1',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: 0,
      offsety: 0,
      bubble_class: 'bubbleleft',
      effect: 'none',
      error_text: 'Enter Password'
   });
});
</script>

		<div class="sidebar_box">
        	<h4>Admin Login</h4>	
			
			<div id="newsletter_box">
			<form action="index.php" method="post" id="Form1">		

			User Name:
			<input type="text"  name="email" class="newsletter_email" id="Editbox1" /><br><br>
			User Password
			<input type="password" name="pass" class="newsletter_email" id="Editbox2"/>	<br><br>	        
            <input type="submit" name="submit_subscribe" id="submit_subscribe" value="Login" />
			<br />
            </form>
			</div>	
			<div class="cleaner"></div>
	          	
        </div>

	
<?php
			}
?>
        <div id="home_service">
		</div>
      	<div class="sidebar_box sbb_last">
            
		</div>
	</div> <!-- end of sidebar -->
    
   <div id="tooplate_main">
<br><br><br><br><br><br><br><br><br><br><br><br>			
			
       <div id="tooplate_content">
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php
if(!isset($_GET["page"]) || $_GET["page"]==1 || $_GET["page"]==0)
{

}
elseif($_GET["page"]==2)
{
include("User_Details.php");
}
elseif($_GET["page"]==3)
{
include("Adds_Details.php");
}
elseif($_GET["page"]==5)
{
include("Ordership_Details.php");
}
elseif($_GET["page"]==6)
{
include("Ordercomplit_Details.php");
}
elseif($_GET["page"]==7)
{
include("Ordersell_Details.php");
}
elseif($_GET["page"]==8)
{
include("Admin_Details.php");
}
?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        </div> <!-- end of content -->
    
    </div> <!-- end of content -->
	</div><!--end of body -->
	
    <div class="cleaner"></div>    
</div> <!-- end of wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">

        <a href="index.php">Home</a> | <a href="about.html">About Us</a> | <a href="services.html">Services</a> | <a href="gallery.html">Gallery</a> | <a href="contact.html">Contact</a> <br /><br />
        
<!--        Copyright © 2048 <a href="#">Company Name</a> - Designed by <a rel="nofollow" href="http://www.tooplate.com" target="_parent">Website Templates</a>-->
		
    </div>
</div>

</body>
</html>