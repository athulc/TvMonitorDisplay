<?php

  include("db.php");

  if (isset($_POST['submit']) ) {

    $img = $_FILES['image']['name'];

    if (empty($img)) {
      echo "<div class='alert alert-info alert-dismissable'>
          <strong>Sorry!</strong> Please choose an image!.
       </div>";
    }else{
      $ord = floor(rand()*0.001);
      $sql = "INSERT INTO timages VALUES ('NULL','$img','yes',$ord)";
      $res = mysqli_query($conn,$sql);

      if ($res) {
        move_uploaded_file($_FILES['image']['tmp_name'], "Images/$img");
        echo "<div class='alert alert-success alert-dismissable' id='success-alert' role='alert'>
          <strong>Success!</strong> Image has been uploaded to folder!.
        </div>";
      }else{
        echo "<script>alert('Image doesn't uploaded to folder!')</script>";
      }
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
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


    $(function() {

      // We can attach the `fileselect` event to all file inputs on the page
      $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
      });

      // We can watch for our custom `fileselect` event like this
      $(document).ready( function() {
          $(':file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }

          });
      });
      
    });

    //Preview Image Code

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#seeImg')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(400);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

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
		  <a href="Image_upload.php" class="active">Upload Image</a>
		  <a href="Image_view.php">All Images</a>
		</div>
    <h1 style="margin-left: 220px;margin-top: 30px;">Upload Image</h1>
    <div style="height: 460px;width: 600px;overflow: hidden;margin-left: 200px;margin-top: 30px;" class="block">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="input-group">
              <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Browse&hellip; <input type="file" name="image" id="fileInput" onchange="readURL(this);" style="display: none;" multiple accept="image/*">
                  </span>
              </label>
              <input type="text" class="form-control" readonly style="width: 270px;" >
              
              <input type="submit" name="submit" value="Upload" class="btn btn-default" style="margin-left: 10px;width: 100px;" >
              <a href="" id="clear" data-toggle="tooltip" title="Clear the file chosen!"><span class="glyphicon glyphicon-remove btn btn-default" style="margin-left: 10px;font-size: 14px;"></span></a><br>

          </div> 
         
          </form> 
          <span class="help-block">Note: Choose images that has to be shown on the display of types .jpg or .png</span>
         
          <table>
            <tr>
              <th style="font-size: 40px;">Instructions</th>
            </tr>
            <tr>
              <td><code style="font-size: 20px;">1. This page is used to upload an image.</code></td>
            </tr>
            <tr>
               <td><code style="font-size: 20px;">2. The page contains options like 'upload,clear & preview'.</code></td>
            </tr>
             <tr>
               <td><code style="font-size: 20px;">3. If image uploaded successfully alert is shown at the top.</code></td>
            </tr>
            <tr>
               <td><code style="font-size: 20px;">4. To upload an image click on the 'Browse' option and choose the image you want and click on 'Upload' button.</code></td>
            </tr>
          </table>
    </div>
    <div style="border: 2px solid grey;height: 500px;width: 480px;margin-left: 10px;padding: 10px;background-color: #DAE0E2;" class="block">
      <table>
        <tr>
          <td><img id="seeImg" src="#" alt="Preview Image"></td>
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