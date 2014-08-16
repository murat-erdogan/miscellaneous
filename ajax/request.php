<!DOCTYPE html>
<html>
<head>
<script src="jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
	$("button").click(function(){
		$.ajax({
			type: "POST",
			url: "ajax.php?action=get",
			data: { name: "John", location: "Boston" }
			})
		.done(function( msg ) {
		$("#result").html(msg);
		});
	});
});
</script>
</head>
<body>
<div id="result"></div>
<button>Submit</button>
</body>
</html>