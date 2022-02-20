<?php
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;
if(dataString=='')
{
alert("Enter some text..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Ordership_Details_action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Ordership_Details_action.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
}
else
{
	
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Ordership_Details_action.php",
data: info,
cache: true,
success: function(html){

$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>

<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Complit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'idc=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
}
else
{
	
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Ordership_Details_action.php",
data: info,
cache: true,
success: function(html){

$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Ordership_Details_action.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM bookcart WHERE cid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from bookcart where cid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div class="content_box">
<div id="contact_form">
<form  method="post" name="form" id="form" action="">
<label for="author">Order Id : <?php echo $row['cid']; ?></label>
<input Type="hidden" name="ucontent" id="ucontent" size="0" maxlength="0" value="<?php echo $row['cid']; ?>" class="input_field">
<label for="author">Shipping Details:*</label>
<textarea name="ucontent1" id="ucontent1" class="input_field" placeholder=""><?php echo $row['Shipinginfo']; ?></textarea>
<br>
<input type="button" value="Update" name="submit" class="Updatesubmit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</form>
</div>
</div>
<?php
}
}
?>

<?php

if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);

$select_table = "update bookcart set Shipinginfo='$ucontent1',ordercomplit='y',Shipingdt='$Rdate' where cid=".$ucontent;
$fetch= mysql_query($select_table);
}

?>

<?php
if(isset($_POST['idc']))
{
$id=$_POST['idc'];
$select_table = "update bookcart set ordercomplit='y',orderdt='$Rdate' where cid=".$id;
$fetch= mysql_query($select_table);

}
else
{

}
?>


<div> <TABLE border="1"  cellpadding="3" cellspacing="0" width="100%">
<tr>
<td><b>Order ID</b></td>
<td><b>User ID</b></td>
<td><b>User Name</b></td>
<td><b>User Email</b></td>
<td><b>User Mob</b></td>
<td><b>Date of Order</b></td>
<td><b>Address</b></td>
<td><b>Book Type/Name</b></td>
<td></td>
</tr>
<?PHP
					$per_page = 5; 
					$select_table = "select * from user_reg,bookcart,bookinfo where bookcart.uid=user_reg.uid and bookcart.bid=bookinfo.Bid and bookcart.Shipinginfo='' group by bookcart.cid";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by bookcart.cid limit $start,$per_page";
$fetch= mysql_query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['cid']; ?></TD>
<TD><?php echo $row['uid']; ?></TD>
<TD><?php echo $row['Name']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD><?php echo $row['Mobile']; ?></TD> 	
<TD><?php echo $row['cdatetime']; ?></TD>
<TD><?php echo $row['Address']; ?></TD>
<TD><?php echo $row['Btype']; ?>, <?php echo $row['BName']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['cid']; ?>">[ X ]</a>
<a href="#" class="Edit" id="<?php echo $row['cid']; ?>">[ Shipping ]</a>
</TD>
</TR>
<?php
}
?>
</TABLE> <TABLE> 
<TR><TD>
<div class="link" align="center">

				<?php
				echo "<a href='#'class='pages' id='1'>[|<]</a>&nbsp;";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<a href='#' class='pages' id=".$i.">[".$i."]</a>";
				}
				echo "&nbsp;<a href='#' class='pages' id=".--$i.">[>|]</a>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>

</div>				

</TD></TR></TABLE> 
</div>