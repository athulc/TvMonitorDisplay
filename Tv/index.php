<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    	body{
    		background-color: ;
    	}
    	.hstyle{
    		font-family: impact;
    		margin-left: 490px;
    		margin-top: 100px;
    		margin-bottom: -100px;
    	}
    	.divstyle{
    		border: 1px solid grey;
    		border-radius: 20px;
    		width: 500px;
    		margin: 200px auto;
    		background-color: #EAF0F1;
    	}
    	.hsub{
    		font-size: 70px;
    	}

    	input[type="checkbox"]{
		  width: 20px; /*Desired width*/
		  height: 20px; /*Desired height*/
		}
		
    </style>
    <script type="text/javascript">
    	function myFunction() {
		  var x = document.getElementById("pass");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		}
    </script>
</head>
<body>
	<h1 class="hstyle hsub">Information Display System</h1>
	<h1 class="hstyle">Login Page</h1>
	<div class="divstyle">
		<form action="login_backend.php" method="post">
			<table style="margin: 100px auto;">
				<tr>	
					<td width="40%" style="font-size: 30px;font-family: Times New Roman;">Username</td>
					<td><input type="text" name="username" id="user" class="form-control" required /></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td width="40%" style="font-size: 30px;font-family: Times New Roman;">Password</td>
					<td><input type="password" name="password" id="pass" class="form-control" style="width: 270px;" required /></td>
				</tr>
				<tr>
					<td style="font-size: 20px;"><input type="checkbox" onclick="myFunction()" style="margin-top: 10px;">Show Password</td>
				</tr>
			</table> 
				<p style="margin: -50px 0px 100px 20px;">
					<input type="submit" name="submit" id="login" class="btn btn-primary btn-lg form-control" value="Login" style="width: 455px;height: 40px;" />
				</p>
		</form>
	</div>
</body>
</html>