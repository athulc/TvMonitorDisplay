<?php

include("db.php");

  //Messages code
  //=========================
  $order_no = array();

  $sql = "SELECT Ordr FROM tmessages;";
  $res = mysqli_query($conn,$sql);

  while ($data = mysqli_fetch_assoc($res)) {
      $order_no[] .= $data['Ordr'];
  }

  //Retrieve messages
  $message_id = 0;
  $message_text = '';
  $message_style = '';
  $message_size = 0;
  $message_active = '';
  $message_order = 0;
  $message_fcolor = '';
  $message_bcolor = '';
  $msg_edit_state = false;

  $res_messages = mysqli_query($conn,"SELECT * FROM tmessages ORDER BY Ordr;");

  if (isset($_POST['msg_insert'])) {
    
    $source = $_POST['msg_text'];
    $style = $_POST['msg_style'];
    $size = $_POST['msg_size'];
    $active = $_POST['msg_active'];
    $morder = $_POST['msg_order'];
    $fcolor = $_POST['msg_fcolor'];
    $bcolor = $_POST['msg_bcolor'];

    if ($fcolor === $bcolor) {
      echo "<div class='alert alert-warning' id='success-alert' role='alert'>
      <strong>Warning! </strong>Selected ForeColor $fcolor and Background color $bcolor are same!
      </div>";
    }else{
      $msg_sql = "INSERT INTO tmessages VALUES('','$source','$style','$size','$active','$morder','$fcolor','$bcolor')";
      $msg_result = mysqli_query($conn,$msg_sql);

      if ($msg_result) {
        echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
            <strong>Success!</strong> Inserted Successfully!.
          </div>";
          header("Refresh: 3; url=Message_insert.php");
      }else{
        echo "<div class='alert alert-danger alert-dismissable'>
            <strong>Sorry!</strong> Inserting data failed!.
         </div>";
      }
    }
  }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Message Insert</title>
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
		  <a href="Message_insert.php" class="active">Insert Message</a>
		  <a href="Message_edit.php">Edit Message</a>
		  <a href="Message_view.php">View Messages</a>
		</div>
    <h1 style="margin:90px 0px 20px 600px;">INSERT MESSAGES</h1>
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
                  <?php if ($msg_edit_state == false):  ?>
                    <td colspan="2"><input type="submit" name="msg_insert" class="btn btn-primary btn-lg form-control" value="Insert Messages" id="imageid"/></td>
                  <?php else: ?>
                    <td colspan="2"><input type="submit" name="msg_update" class="btn btn-primary btn-lg form-control" value="Update Messages" id="imageid"/></td>
                  <?php endif ?>
                </tr>
             </table>
           </form>    
	     </div>
       <div class="block" style="border: 2px dashed grey;height: 440px;width: 500px;margin-left: 10px;padding: 10px;">
          <table>
            <tr>
              <th style="font-size: 25px;">Instructions</th>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">1. Enter the message you want to display inside textbox.</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">2. Choose the font family from the dropdown list.</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">3. Choose the font-size from the dropdown list.</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">4. Choose the forecolor for the message.</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">5. Choose the background color for the message.</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">6. Choose the status for the message (Y/N).</code></td>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">7. Enter the order of webpage.Make sure that order of every page must be unique.</code></td>
            </tr>
          </table>
    </div><br>
    <div style="height: 80px;width: 700px;margin-left: 200px;">
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