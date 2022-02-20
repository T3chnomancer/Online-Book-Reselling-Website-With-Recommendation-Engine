<?php
include('db.php');
?>
<div id="flash" class="flash"></div>


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
url: "Adds_Details_action.php",
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
url: "Adds_Details_action.php",
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
url: "Adds_Details_action.php",
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
$delete = "DELETE FROM bookinfo WHERE Bid='$id'";
mysql_query( $delete);
}
?>



<div> <TABLE border="1"  cellpadding="3" cellspacing="0" width="100%">
<tr>
<td><b>BID</b></td>
<td><b>Name</b></td>
<td><b>Author</b></td>
<td><b>Publishers</b></td>
<td><b>Type</b></td>
<td><b>Price</b></td> 	
<td><b>Selling Price</b></td> 	
<td></td>
</tr>

<?PHP

$searchid="";
if(isset($_POST['sid']))
{
	$searchid=$_POST['sid'];
}
 	 	 

					$per_page = 5;
					$select_table = "select * from bookinfo  where concat(BName,' ',Author,' ',Publishers,' ',Btype) like '%$searchid%'";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;

if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Bid limit $start,$per_page";
$fetch= mysql_query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Bid']; ?></TD>
<TD><?php echo $row['BName']; ?></TD>
<TD><?php echo $row['Author']; ?></TD>
<TD><?php echo $row['Publishers']; ?></TD>
<TD><?php echo $row['Btype']; ?></TD>
<TD><?php echo $row['APrice']; ?></TD>
<TD><?php echo $row['SPrice']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Bid']; ?>">[ X ]</a>
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
				echo "<input type='text' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>

</div>				

</TD></TR></TABLE> 
</div>