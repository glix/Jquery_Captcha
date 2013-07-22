<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="captcha_files/jquery-1.2.6.min.js"></script>
<script>
	$(document).ready(function() { 
		 $('#Send').click(function(e) {  
		 e.preventDefault();
			$.post("captcha_files/post.php?"+$("#MYFORM").serialize(), {
				}, function(response){
					if(response==1)
					{
						alert('Right captcha code');
						change_captcha();
						$('#MYFORM').submit();
					}
					else
					{
						if($('#code').val()=='')
						{
							alert('Enter the captcha code');
						}
						else{
							alert('Invalid captcha code');
						}
						
					}
			});
		 });
		 
		 // refresh captcha
		 $('img#refresh').click(function() {  
				change_captcha();
		 });
		 
		 function change_captcha()
		 {
			document.getElementById('captcha').src="captcha_files/get_captcha.php?rnd=" + Math.random();
		 }
	});
</script>		 
</head>
<body>
<form action="http://www.google.co.in" name="MYFORM" id="MYFORM">
		<img src="captcha_files/get_captcha.php" alt="" id="captcha" />
		<input name="code" type="text" id="code">
		<img src="captcha_files/refresh.jpg" width="25" alt="" id="refresh" />
		<input value="Send" type="submit" id="Send">
</form>
</body>
</html>