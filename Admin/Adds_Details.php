<h4>Books List</h4>
<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>
<div>Enter Book Name/Author/Publishers: <br>
 <input type="text" id="sertex" name="sertex" class="sertex" Style="width:400px;" onkeyup="autosearch(1);"><br>
<div>
<script type="text/javascript">
function autosearch(str)
{
//var textcontent2 = $("#pagva").val();
var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+'&page=1';
if(info=='')
{
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
}  
});
}
}
</script>
<hr>
<script type="text/javascript">
$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Adds_Details_action.php",
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


</head>

<body>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
