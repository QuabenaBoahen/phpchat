<?php 
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Simple PHP Chat App | Boahen Fred </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function ajax(){

			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				//if request is completed and successful
				if(req.readyState == 4 && req.status==200){
					//replace the data with the response gotten from the server
                 document.getElementById('chat').innerHTML=req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}
	</script>
</head>
	<body onload="ajax();">
		<div id="container">

		<div id="chat_box">
		<div id="chat"></div>
		</div>
		<form action="index.php" method="post">
			<input type="text" name="name" placeholder="Enter Name .." />
			<textarea name="message" placeholder="Enter Message .." ></textarea>
			<input type="submit" name="submit" value="Send"/>
		</form>
   <?php 
  if(isset($_POST['submit'])){
  	$name=$_POST['name'];
  	$message=$_POST['message'];
  	$date=date("F j, Y, g:i a");
  	$query="INSERT INTO chat (name,message,date) values('$name','$message','$date')";
  	$run = $con -> query($query);

  	if($run){
  		echo "<embed loop='false' src='youGotmail.wav' autoplay='true' hidden='true' />";
  	}
  }
   ?>
		</div>
	</body>
</html>