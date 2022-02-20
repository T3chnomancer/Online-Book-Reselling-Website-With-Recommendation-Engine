<?php
if(!isset($_GET["G"]) || $_GET["G"]==1 || $_GET["G"]==0)
{
?>
<iframe name="InlineFrame1" id="InlineFrame1" style="position:absolute;width:600px;height:402px;" src="http://localhost/Digvijay/Admin/graph1.php" frameborder="0"></iframe>
<?php
}
elseif($_GET["G"]==2)
{
?>
<iframe name="InlineFrame1" id="InlineFrame1" style="position:absolute;width:600px;height:402px;" src="http://localhost/Digvijay/Admin/graph2.php" frameborder="0"></iframe>
<?php
}
elseif($_GET["G"]==3)
{
?>
<iframe name="InlineFrame1" id="InlineFrame1" style="position:absolute;width:600px;height:402px;" src="http://localhost/Digvijay/Admin/graph3.php" frameborder="0"></iframe>
<?php
}
else
{
?>
<iframe name="InlineFrame1" id="InlineFrame1" style="position:absolute;width:600px;height:402px;" src="http://localhost/Digvijay/Admin/graph1.php" frameborder="0"></iframe>
<?php
}
?>

