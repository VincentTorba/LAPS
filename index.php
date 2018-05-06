 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		function nextPage(){
			window.location = "problem.html";
		}
	</script>
</head>
<body>

<div class="container">
	<input type="text" id="txtUname"> <br />
	<input type="password" id="txtPwd"> <br />
	<button id="btnSubmit" onclick="nextPage()">Login</button>

</div>

</body>
</html> 
