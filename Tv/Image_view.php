<?php

  echo "<div id='result'></div>";

  include("db.php");

  $imgid = 0;
  $imgsource = '';
  $imgactive = '';
  $img_edit_state = false;
  $img_result = mysqli_query($conn,"SELECT * FROM timages;");


  if (isset($_POST['active']) && isset($_POST['imgid'])) {
    
    $imgid = mysqli_real_escape_string($conn,$_POST['imgid']);
    $imgactive = mysqli_real_escape_string($conn,$_POST['active']);
  

    $img_query = "UPDATE timages SET Active='$imgactive' WHERE id = '$imgid'";
    $img_output = mysqli_query($conn,$img_query);

    if ($img_output) {
      echo "<div class='alert alert-success alert-dismissable'>
          <strong>Success!</strong> Updated Successfully!.
        </div>";
      
    }else{
      echo "<div class='alert alert-danger alert-dismissable'>
          <strong>Sorry!</strong> Update has not occured!.
       </div>";
    } 

    echo "<meta http-equiv='refresh' content='2;url=Image_view.php'>";
  }

  if (isset($_GET['img_edit'])) {
    $imgid = $_GET['img_edit'];
    $img_edit_state = true;
    $img_rec = mysqli_query($conn,"SELECT * FROM timages WHERE id = $imgid;");
    $img_record = mysqli_fetch_array($img_rec);

    $imageid = $img_record['id'];
    $imgsource = $img_record['Source'];
    $imgactive = $img_record['Active'];
  }

  //Delete Records

  if (isset($_POST['img_delete']) && isset($_GET['img_edit'])) {
    
    $imgid = $_GET['img_edit'];
    $del_img_sql = "DELETE FROM timages WHERE id = $imgid";
    $del_img_result = mysqli_query($conn,$del_img_sql);

    if ($del_img_result) {
      echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
          <strong>Success!</strong>Image deleted successfully!.
        </div>";
        unlink("Images/$imgsource");
      header("Refresh: 3; url=Image_view.php");
    }else{
      echo "<div class='alert alert-danger alert-dismissable'>
          <strong>Sorry!</strong> Deleting image failed!.
       </div>";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Image View</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
  body {
    font-family: "Lato", sans-serif;
  }

  * {
      box-sizing: border-box;
    }

.check{
      margin-left: 100px;
      font-size: 150px;
      margin-top: -160px;
      color: #2C3335;
    }

.column {
      float: left;
      width: 33.33%;
      padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
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
    
    //--------------------------------------------------------------------

      $(document).ready(function(){
        $('input[type="radio"]').click(function(){
          var active = $(this).val();

          $.ajax({
            url: "Image_view.php",
            method: "POST",
            data: {active: active,imgid: <?php echo $imageid; ?>},
            success: function(data){
              $("#result").html(data);
            }
          });
        });
      });

    //--------------------------------------------------------------------

  </script>

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
		  <a href="Image_upload.php">Upload Image</a>
		  <a href="Image_view.php" class="active">All Images</a>
		</div>
    <h1 style="margin-left: 220px;margin-top: 30px;">All Images</h1>
    
    <div style="border: 2px solid grey;height: 500px;width: 480px;margin-left: 200px;padding: 10px;" class="block">
      <form method="post" action="">
        <input type="hidden" name="img_id" value="<?php echo $imgid; ?>">
        <table border="1" class="table table-hover">
          <tr>
            <th>Name</th>
            <td><input type="text" name="img_source" class="form-control" required value="<?php echo $imgsource; ?>" readonly /></td>
          </tr>
          <tr>
            <th>Active</th>
            <td>
              <label class="radio-inline"><input type="radio" name="img_active" value="yes"  required  
                <?php if($imgactive == "yes"){
                  echo "checked";
                } ?> />Yes</label>
              <label class="radio-inline"><input type="radio" name="img_active" value="no" 
                <?php if($imgactive == "no"){
                  echo "checked";
                } ?> />No</label>
              </div>
              </div>
            </td>
          </tr>
          <tr>
            <th>Operations</th>
            <td>
              <?php if ($img_edit_state == true): ?>
                <a href="preview_image.php?img=<?php echo $imgsource; ?>" class="btn btn-primary btn-lg">Preview</a>
                <input type="submit" class="btn btn-danger btn-lg" name="img_delete" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');" />
              <?php else: ?>
            <a href="preview_image.php" class="btn btn-primary btn-lg disabled">Preview</a>
                <input type="submit" class="btn btn-danger btn-lg disabled" name="img_delete" value="Delete" />
              <?php endif ?>
            </td>
          </tr>
        </table>
    </form>
    <table>
        <tr>
          <th style="font-size: 40px;">Instructions</th>
        </tr>
        <tr>
          <td><code style="font-size: 20px;">1. Click on any image to edit.</code></td>
        </tr>
        <tr>
           <td><code style="font-size: 20px;">2. The page contains options like 'Preview & Delete'.</code></td>
        </tr>
         <tr>
           <td><code style="font-size: 20px;">3. Once status of image is edited, it will update automatically.</code></td>
        </tr>
        <tr>
           <td><code style="font-size: 20px;">4. 'Preview' option will open new page where it will show preview of an image in fullscreen.</code></td>
        </tr>
        <tr>
           <td><code style="font-size: 20px;">5. The 'Name' textbox cannot be edited it is read only.</code></td>
        </tr>
      </table>
    </div>
    <div style="border: 1px solid grey;height: 500px;width: 800px;margin-left: 10px;margin-top: 30px;overflow-y: scroll;" class="block">
      <?php 
        $countpic = count(glob("Images/*.{jpg,png}",GLOB_BRACE));
              $arr_img = array();
              $arr_img = glob("Images/*.{jpg,png}",GLOB_BRACE);

        while ($image_data = mysqli_fetch_assoc($img_result)) { ?>
        
          <div class="column">
            <a href="Image_view.php?img_edit=<?php echo $image_data['id']; ?>">
            <?php  echo '<img src="Images/'.$image_data['Source'].'" style="width:100%" /><br />'; ?>

            <?php if($image_data['Active'] == "yes"):  ?>
                <span class="glyphicon glyphicon-ok check"></span>
              <?php else: ?>
                <span class="glyphicon glyphicon-remove check"></span>
              <?php endif ?>
          </a>
          </div>

        <?php } ?>
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