<?php 
  
  include("db.php");
  $sql = "SELECT * FROM twebpage ORDER BY Ordr;";
  $res = mysqli_query($conn,$sql);
  
  if (isset($_GET['del'])) {
    
    $id = $_GET['del'];
    $del_sql = "DELETE FROM twebpage WHERE wid = $id";
    $del_result = mysqli_query($conn,$del_sql);

    if ($del_result) {
      echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
          <strong>Success!</strong> Deleted Successfully!.
        </div>";
      header("Refresh: 3; url=View.php");
    }else{
      echo "<div class='alert alert-danger alert-dismissable'>
          <strong>Sorry!</strong> Deleting data failed!.
       </div>";
    }
  }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Webpages</title>
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

.vl{
  border-left: 2px solid grey;
  height: 650px;
  margin-left: 810px;
  margin-top: -450px;
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
	<div style="border: 1px solid grey;height: 785px;width: 1777px;" id="main2" >
		<div class="topnav">
		  <a href="Insert.php">Insert Webpage</a>
		  <a href="Edit.php">Edit Webpage</a>
		  <a href="View.php" class="active">View Webpages</a>
		</div>
    <h1 style="margin-left: 220px;margin-top: 30px;">All Webpages</h1>
    <div style="border: 1px solid grey;height: 460px;width: 800px;overflow-y: scroll;margin-left: 200px;margin-top: 30px;" class="block">
          <table border="1" class="table table-hover">
            <tr>
                <th>Order</th>
                <th>Webpage</th>
                <th colspan="2">Status</th>
            </tr>

            <?php  while ($data = mysqli_fetch_assoc($res)) { ?>
                <tr>
                  <td><?php echo $data['Ordr']; ?></td>
                  <td><?php echo $data['Source']; ?></td>
                  <td>
                    <?php if ($data['Active'] == "yes") {
                      echo "<span class='glyphicon glyphicon-ok' style='margin: 8px 15px;'></span>";
                    }else{
                      echo "<span class='glyphicon glyphicon-remove' style='margin: 8px 15px;'></span>";
                    } ?>
                  </td>
                  <td><a href="?del=<?php echo $data['wid']; ?>"><span class="btn btn-danger glyphicon  glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"></span></a></td>
                </tr>
            <?php  } ?>
          </table>
    </div>
    <div style="border: 2px dashed grey;height: 500px;width: 480px;margin-left: 10px;padding: 10px;" class="block">
      <table>
        <tr>
          <th style="font-size: 40px;">Instructions</th>
        </tr>
        <tr>
          <td><code style="font-size: 20px;">1. The view page is for quick glance into the active webpages.</code></td>
        </tr>
        <tr>
           <td><code style="font-size: 20px;">2. The view page contains only delete operation.</code></td>
        </tr>
         <tr>
           <td><code style="font-size: 20px;">3. By clicking on delete option you can delete perticular webpage from table.</code></td>
        </tr>
         <tr>
           <td><code style="font-size: 20px;">4. The view page contains only delete operation.</code></td>
        </tr>
        <tr>
           <td><code style="font-size: 20px;">5. If you want to edit perticular webpage click on 'Edit Webpage' option on nav bar.</code></td>
        </tr>
         <tr>
           <td><code style="font-size: 20px;">6. The view page contains details about Order,Path,Status,etc.</code></td>
        </tr>
      </table>
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