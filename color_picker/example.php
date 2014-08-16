<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/colpick.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/colpick.css" type="text/css"/>
<div id="picker"></div>
<div id="div1"></div>
<script>
$('#picker').colpick({
	flat:true,
	layout:'hex',
	submit:0,
	onChange:function(hsb,hex,rgb,el,bySetColor) {
		$.post("get.php",{suggest:hex},function(result){
		$("#div1").html(result);
		});
	}
});
</script>
