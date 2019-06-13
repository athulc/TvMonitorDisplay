<?php 
  
  include("db.php");
  $sql = "SELECT * FROM twebpage ORDER BY Ordr;";
  $res = mysqli_query($conn,$sql);

  $webid = 0;
  $websource = '';
  $webstatus = '';
  $web_preview = false;

  // Update webpage records

  if (isset($_POST['webUpdate'])) {
    
    $webid = mysqli_real_escape_string($conn,$_POST['id']);
    $websource = mysqli_real_escape_string($conn,$_POST['websource']);
    $webstatus = mysqli_real_escape_string($conn,$_POST['webstatus']);
    $weborder = mysqli_real_escape_string($conn,$_POST['weborder']);
  

    $query = "UPDATE twebpage SET Source='$websource',Active='$webstatus',Ordr='$weborder' WHERE wid= '$webid'";
    $out = mysqli_query($conn,$query);

    if ($out) {
      echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
          <strong>Success!</strong> Updated Successfully!.
        </div>";
      header("Refresh: 3; url=Edit.php");
    }else{
      echo "<div class='alert alert-danger alert-dismissable'>
          <strong>Sorry!</strong> Update has not occured!.
       </div>";
    } 
  }

  if (isset($_GET['edit'])) { 
    $webid = $_GET['edit'];
    $web_preview = true;

    $edit_sql = "SELECT * FROM twebpage WHERE wid = $webid;";
    $edit_res = mysqli_query($conn,$edit_sql);

   while ($edit_data = mysqli_fetch_assoc($edit_res)) {

      $websource = $edit_data['Source'];
      $webstatus = $edit_data['Active'];
      $weborder = $edit_data['Ordr'];

   }  
        
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Webpage</title>
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
		  <a href="Insert.php">Insert Webpage</a>
		  <a href="Edit.php" class="active">Edit Webpage</a>
		  <a href="View.php">View Webpages</a>
		</div>
    <h1 style="margin:50px 0px 50px 200px;">EDIT WEBPAGES <span style="margin-left: 500px;">All Webpages</span></h1>
    <div style="height: 460px;width: 600px;border: 1px solid black;margin-left: 80px;" class="block">
      <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $webid; ?>">
        <table border="1" class="table table-hover">
          <tr>
             <th>Source</th>
             <td><textarea class="form-control" style="width: 500px;" rows="5" name="websource"><?php echo $websource; ?></textarea></td>
          </tr>
          <tr>
              <th width="200">Active</th>
              <td height="50">
                <label class="radio-inline"><input type="radio" name="webstatus" value="yes" required <?php if ($webstatus == 'yes') echo "checked"; ?>>Yes</label>
                <label class="radio-inline"><input type="radio" name="webstatus" value="no" required <?php if ($webstatus == 'no') echo "checked"; ?>>No</label>
              </td>
          </tr>

          <tr>
              <th>Order</th>
              <td>
                <input type="number" name="weborder" class="form-control block" min="0" value="<?php echo $weborder; ?>" style="width: 100px;">
                <?php if ($web_preview): ?>
                    <a href='<?php echo $websource; ?>' class='btn btn-default block' style='margin-left: 5px;'>Preview</a>
                <?php  else: ?>
                    <a href='<?php echo $websource; ?>' class='btn btn-default block disabled' style='margin-left: 5px;'>Preview</a>
                <?php endif ?>
              </td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="webUpdate" class="btn btn-primary form-control" value="Update"></td>
          </tr>
          <tr>
            <td colspan="2" height="90">Instructions  
            <pre> 1. Enter the exact path of the webpage including http protocol.</pre>
            <pre> 2. Choose the status of the webpage (Y/N).</pre>
            <pre> 3. Enter the order of the webpage, starting from 0.</td></pre>
          </tr>
        </table>
         </form>
    </div>

    <div class="block" style="border: 1px solid grey;height: 460px;width: 800px;overflow-y: scroll;">
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
                  <td><a href="?edit=<?php echo $data['wid']; ?>"><span class="btn btn-primary glyphicon glyphicon-pencil"></span></a></td>
                </tr>
            <?php  } ?>
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