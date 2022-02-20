<h4>Admin Details</h4>
<hr>


<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
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



</head>

<body>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
