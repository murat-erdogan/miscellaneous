<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style> 
#image-test {
    width: 300px;
    height: 300px;
    border: 1px solid #CCC;
}
</style>
</head>
<body>
<script>
function checkImage(src) {
  var img = new Image();
  img.onload = function() {
      alert('yes');
  };
  img.onerror = function() {
    alert('no');
  };

  img.src = src;
}
$(document).ready(function() {
checkImage('http://i2.cdn.turner.com/cnn/dam/assets/140815141857-ukraine-convoy-rostov-wall-4-tease.jpg');
});
</script>
<div id="image-test"></div>

</body>
</html>