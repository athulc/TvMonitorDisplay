<?php 
  
  include("db.php");
  $sql = "SELECT * FROM tmessages ORDER BY Ordr;";
  $res = mysqli_query($conn,$sql);

  //Retrieve messages
  $message_id = 0;
  $message_text = '';
  $message_style = '';
  $message_size = 0;
  $message_active = '';
  $message_order = 0;
  $message_fcolor = '';
  $message_bcolor = '';

  $res_messages = mysqli_query($conn,"SELECT * FROM tmessages ORDER BY Ordr;");

  //Update messages

  if (isset($_POST['msg_update'])) {
    
    $message_id = mysqli_real_escape_string($conn,$_POST['msg_id']);
    $message_text = mysqli_real_escape_string($conn,$_POST['msg_text']);
    $message_style = mysqli_real_escape_string($conn,$_POST['msg_style']);
    $message_size = mysqli_real_escape_string($conn,$_POST['msg_size']);
    $message_active = mysqli_real_escape_string($conn,$_POST['msg_active']);
    $message_order = mysqli_real_escape_string($conn,$_POST['msg_order']);
    $message_fcolor = mysqli_real_escape_string($conn,$_POST['msg_fcolor']);
    $message_bcolor = mysqli_real_escape_string($conn,$_POST['msg_bcolor']);
  
    if ($message_fcolor === $message_bcolor) {
      echo "<div class='alert alert-warning'>
      <p>Selected ForeColor $message_fcolor and Background color $message_bcolor are same</p>
      </div>";
    }else{
      $query = "UPDATE tmessages SET Source='$message_text',Font='$message_style',Size='$message_size',Active='$message_active',Ordr='$message_order',Fcolor='$message_fcolor',Bcolor='$message_bcolor' WHERE Mid= '$message_id'";
      $out = mysqli_query($conn,$query);

      if ($out) {
        echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
            <strong>Success!</strong> Updated Successfully!.
          </div>";
        header("Refresh: 3; url=Message_edit.php");
      }else{
        echo "<div class='alert alert-danger alert-dismissable'>
            <strong>Sorry!</strong> Update has not occured!.
         </div>";
      } 
    }
  }

  if (isset($_GET['edit_msg'])) {
    $message_id = $_GET['edit_msg'];
    $msg_edit_state = true;
    $rec = mysqli_query($conn,"SELECT * FROM tmessages WHERE Mid = $message_id;");
    $record = mysqli_fetch_array($rec);

    $wid = $record['Mid'];
    $message_text = $record['Source'];
    $message_style = $record['Font'];
    $message_size = $record['Size'];
    $message_active = $record['Active'];
    $message_order = $record['Ordr'];
    $message_fcolor = $record['Fcolor'];
    $message_bcolor = $record['Bcolor'];
  }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Message Edit</title>
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
		  <a href="Message_insert.php">Insert Message</a>
		  <a href="Message_edit.php" class="active">Edit Message</a>
		  <a href="Message_view.php">View Messages</a>
		</div>
    <h1 style="margin:50px 0px 50px 200px;">EDIT MESSAGES <span style="margin-left: 500px;">All Messages</span></h1>
    <div style="height: 435px;width: 700px;border: 1px solid black;margin-left: 200px;" class="block">
         <form action="" method="post">
            <input type="hidden" name="msg_id" value="<?php echo $message_id; ?>">
             <table border="1" class="table table-hover">
                <tr>
                  <th>Text</th>
                  <td><textarea class="form-control" rows="3" name="msg_text" required><?php echo $message_text; ?></textarea></td>
                </tr>
                <tr>
                  <th>Font Family</th>
                  <td>
              <select name="msg_style" class="form-control" required>
                <option value="">Select the font-family</option>
                <option value="Times New Roman" <?php if($message_style == "Times New Roman") { echo "selected='selected'"; }?>>Times New Roman</option>
                <option value="Courier New" <?php if($message_style == "Courier New") { echo "selected='selected'"; } ?>>Courier New</option>
                <option value="Lucida Console" <?php if($message_style == "Lucida Console") { echo "selected='selected'"; } ?> >Lucida Console</option>
                <option value="Arial" <?php if($message_style == "Arial") { echo "selected='selected'"; } ?>>Arial</option>
                <option value="Verdana" <?php if($message_style == "Verdana") { echo "selected='selected'"; } ?>>Verdana</option>
                <option value="Impact" <?php if($message_style == "Impact") { echo "selected='selected'"; } ?>>Impact</option>
                <option value="Satisfy" <?php if($message_style == "Satisfy") { echo "selected='selected'"; } ?>>Satisfy</option>
                <option value="Dancing Script" <?php if($message_style == "Dancing Script") { echo "selected='selected'"; } ?>>Dancing Script</option>
              </select>
            </td>
                </tr>
                <tr>
                  <th>Font Size</th>
                  <td>
              <select name="msg_size" class="form-control" required>  
                <option value="">Select the font-size</option>
                <option value="18" <?php if($message_size == "18") { echo "selected='selected'"; } ?>>18</option>
                <option value="20" <?php if($message_size == "20") { echo "selected='selected'"; } ?>>20</option>
                <option value="26" <?php if($message_size == "26") { echo "selected='selected'"; } ?>>26</option>
                <option value="32" <?php if($message_size == "32") { echo "selected='selected'"; } ?>>32</option>
                <option value="40" <?php if($message_size == "40") { echo "selected='selected'"; } ?>>40</option>
              </select>
            </td>
                </tr>
                <tr>
                  <th>ForeColor</th>
                  <td><input type="color" name="msg_fcolor" value="<?php echo $message_fcolor; ?>" class="form-control" style="width: 200px;" /></td>
                </tr>
                <tr>
                  <th>BackGroundColor</th>
                  <td><input type="color" name="msg_bcolor" value="<?php echo $message_bcolor; ?>" class="form-control" style="width: 200px;" /></td>
                </tr>
                <tr>
                  <th>Active</th>
                  <td>
                    <label class="radio-inline"><input type="radio" name="msg_active" value="yes" required  
                      <?php if($message_active == "yes"){
                        echo "checked";
                      } ?> />Yes</label>
                    <label class="radio-inline"><input type="radio" name="msg_active" value="no"  
                      <?php if($message_active == "no"){
                        echo "checked";
                      } ?> />No</label>
                  </td>
                </tr>
                <tr>
                  <th>Order</th>
                  <td>
                    <div class="col-xs-3" style="margin-left: -15px;display: inline-block;"><input type="number" name="msg_order" min="0" class="form-control" required value="<?php echo $message_order; ?>" /></div>
                    <div><a href="messages.php" class="btn btn-default">Preview</a></div>
                  </td>
                </tr> 
                <tr>
                    <td colspan="2"><input type="submit" name="msg_update" class="btn btn-primary btn-lg form-control" value="Update Messages" id="imageid"/></td>
                </tr>
             </table>
           </form>    
       </div>

       <div class="block" style="border: 1px solid grey;height: 435px;width: 600px;overflow-y: scroll;">
          <table border="1" class="table table-hover">
            <tr>
                <th>Order</th>
                <th>Messages</th>
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
                  <td><a href="?edit_msg=<?php echo $data['Mid']; ?>"><span class="btn btn-primary glyphicon glyphicon-pencil"></span></a></td>
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