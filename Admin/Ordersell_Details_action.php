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
url: "Ordersell_Details_action.php",
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
url: "Ordersell_Details_action.php",
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

$searchid="";
if(isset($_POST['sid']))
{
	$searchid=$_POST['sid'];
}
 	 	 

					$per_page = 5; 
					 $select_table = "select * from user_reg,bookcart,bookinfo where bookcart.uid=user_reg.uid and bookcart.bid=bookinfo.Bid and bookcart.OrderEnd='y' and concat(user_reg.Name,' ',user_reg.Email,' ',user_reg.Mobile,' ',bookinfo.Btype,' ',bookinfo.BName,' ',user_reg.Address) like '%$searchid%' group by bookcart.cid";
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
//echo $select_table;
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