


<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="UserAdmin//load.gif"></span>');
$.ajax({
type: "POST",
url: "actiontranorder.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
return false;
});

</script>


<script type="text/javascript">
$(function() {
$(".ABC").click(function() {

var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;

var textcontent = $("#content").val();
if(textcontent=='')
{
alert("Enter some text.."+info);
//$("#content").focus();
}
else
{
alert("Enter some text.."+textcontent);
}
return false;
});
});
</script>



<div style="margin:0;padding:0;position:absolute;left:20px;"><u><h1>Transaction Details</h1></u></div>
<div id="flash" class="flash"></div>
<div style="margin:0;padding:0;position:absolute;left:20px;top:85px;" id="show" class="show"></div>