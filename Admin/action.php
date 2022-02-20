<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

if(dataString=='')
{
alert("Enter some text..");
}
else
{

$.ajax({
type: "POST",
url: "admin_valid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
}
});

}
return false;
});
});
</script>

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
	$.ajax({
type: "POST",
url: "admin_valid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
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
url: "action.php",
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
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
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
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
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
$delete = "DELETE FROM admin WHERE Aid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from admin where Aid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div class="content_box">
<div id="contact_form">
<form  method="post" name="form" id="form" action="">
<label for="author">Admin Id:*</label>
<input Type="text" name="ucontent" id="ucontent" size="0" maxlength="0" value="<?php echo $row['Aid']; ?>" class="input_field">
<label for="author">Admin Name:*</label>
<input Type="text" name="ucontent1" id="ucontent1" value="<?php echo $row['Aname']; ?>" class="input_field">
<label for="author">Admin Email:*</label>
<input Type="text" name="ucontent2" id="ucontent2" value="<?php echo $row['Aemail']; ?>" class="input_field">
<label for="author">Admin Password:*</label>
<input Type="Password" name="ucontent3" id="ucontent3" value="<?php echo $row['Apwd']; ?>" class="input_field">
<label for="author">Admin Mobile No:*</label>
<input Type="text" name="ucontent4" id="ucontent4" value="<?php echo $row['Amob']; ?>" class="input_field">
<br><br>
<input type="button" value="Update" name="submit" class="Updatesubmit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</form>
</div>
</div>
<?php
}
}
else
{
?>
<div class="content_box">
<div id="contact_form">
<form name="form" id="form">
<label for="author">Admin Name:*</label>
<input Type="text" name="content" id="content" class="input_field">
<label for="author">Admin Email:*</label>
<input Type="text" name="content1" id="content1" class="input_field">
<label for="author">Admin Password:*</label>
<input Type="Password" name="content2" id="content2" class="input_field">
<label for="author">Admin Mobile No:*</label>
<input Type="text" name="content3" id="content3" class="input_field">
<br><br>
<input type="button" value="Post" name="submit" class="submit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</form>
</div>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{

$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$RD=date('Y-m-d');

mysql_query("insert into admin(Aname,Aemail,Apwd,Amob) values ('$content','$content1','$content2','$content3')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);

$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("update  admin set Aname='$ucontent1', Aemail='$ucontent2', Apwd='$ucontent3', Amob='$ucontent4' where Aid=$ucontent");
}
?>

<div> <TABLE border="1"  cellpadding="3" cellspacing="0" width="100%">
<tr>
<td><b>Admin ID</b></td>
<td><b>Admin Name</b></td>
<td><b>Admin Email</b></td>
<td><b>Admin Mobile No</b></td>
<td></td>
</tr>
<?PHP
					$per_page = 5; 
					$select_table = "select * from admin";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Aid limit $start,$per_page";
$fetch= mysql_query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Aid']; ?></TD>
<TD><?php echo $row['Aname']; ?></TD>
<TD><?php echo $row['Aemail']; ?></TD>
<TD><?php echo $row['Amob']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Aid']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['Aid']; ?>">[ Update ]</a>
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