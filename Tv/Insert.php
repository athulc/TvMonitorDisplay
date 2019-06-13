<?php

include("db.php");

$order_no = array();

$sql = "SELECT Ordr FROM twebpage;";
$res = mysqli_query($conn,$sql);

while ($data = mysqli_fetch_assoc($res)) {
    $order_no[] .= $data['Ordr'];
}

//Webpage Code
  //=============================

  if (isset($_POST['insert'])) {
    
    $source = $_POST['web_source'];
    $active = $_POST['web_status'];
    $worder = $_POST['web_order'];

    $web_sql = "INSERT INTO twebpage VALUES('','$source','$active','$worder')";
    $web_result = mysqli_query($conn,$web_sql);

    if ($web_result) {
      echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
          <strong>Success!</strong> Inserted Successfully!.
        </div>";
        header("Refresh:3;URL=insert.php");
    }else{
      echo "<div class='alert alert-danger alert-dismissable' role='alert'>
          <strong>Sorry!</strong> Inserting data failed!.
       </div>";
    }

  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Webpage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
body {
  font-family: "Lato", sans-serif;
}


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav a.active {
  border-bottom: 3px solid red;
}

.block{
  display: inline-block;
}
</style>
<script type="text/javascript">
  
  //Hiding alerts 

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).hide();
        });
    }, 2000);

</script>
</head>
<body>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="Dashboard.php">Dashboard</a>
	  <a href="Insert.php">Webpages</a>
	  <a href="Message_insert.php">Messages</a>
	  <a href="Image_upload.php">Images</a>
	</div>

	<div id="main" style="border: 1px solid black;padding: 5px;background-color: #3498DB;">
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		<span style="margin-left: 700px;color: white;font-size: 30px;">Admin Page</span>
		<a href="log_out.php" style="margin-left: -850px;"><span class="btn btn-default">Logout</span></a>
	</div>
	<div style="border: 1px solid grey;height: 785px;width: 1777px;" id="main2">
		<div class="topnav">
		  <a href="Insert.php" class="active">Insert Webpage</a>
		  <a href="Edit.php">Edit Webpage</a>
		  <a href="View.php">View Webpages</a>
		</div>
    <h1 style="margin:150px 0px 50px 600px;">INSERT WEBPAGES</h1>
    <form action="" method="post">
    <div style="height: 265px;width: 700px;border: 1px solid black;margin-left: 300px;" class="block">
        <table border="1" class="table table-hover">
          <tr>
             <th>Source</th>
             <td><textarea class="form-control" style="width: 620px;" rows="5" name="web_source" required></textarea></td>
          </tr>
          <tr>
              <th>Active</th>
              <td>
                <label class="radio-inline"><input type="radio" name="web_status" value="yes" required>Yes</label>
                <label class="radio-inline"><input type="radio" name="web_status" value="no" required>No</label>
              </td>
          </tr>
          <tr>
              <th>Order</th>
              <td><input type="number" name="web_order" class="form-control" min="0" required style="width: 120px;"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="insert" class="btn btn-primary form-control"></td>
          </tr>
        </table>
    </div>
    <div class="block" style="border: 2px dashed grey;height: 265px;width: 450px;margin-left: 10px;padding: 10px;">
      <table>
        <tr>
          <th style="font-size: 25px;">Instructions</th>
        </tr>
        <tr>
          <td><code style="font-size: 20px;">1. Enter the exact path of the webpage including http protocol.</code></td>
        </tr>
        <tr>
          <td><code style="font-size: 20px;">2. Choose the status of webpage (Y/N).</code></td>
        </tr>
        <tr>
          <td><code style="font-size: 20px;">3. Enter the order of webpage.Make sure that order of every page must be unique.Order starts from 0.</code></td>
        </tr>
      </table>
    </div>
    </form>
    <div style="height: 100px;width: 700px;margin-left: 300px;">
        <h3>Already existing orders:
        <?php

            for ($i=0; $i < count($order_no) ; $i++) { 
              echo $order_no[$i];
                if ($i == count($order_no) - 2) {
                    echo " & ";
                }else if ($i == count($order_no) - 1) {
                  echo " ";
                }else{
                  echo " , ";
                }
            }

        ?></h3>
        <p>Note:The above numbers cannot be repeated.</p>
    </div>
	</div>
	<script>

		/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
		function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		  document.getElementById("main2").style.marginLeft = "250px";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		  document.getElementById("main").style.marginLeft = "0";
		  document.getElementById("main2").style.marginLeft = "0";
		}

	</script>
</body>
</html>