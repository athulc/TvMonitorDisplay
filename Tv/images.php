<!DOCTYPE html>
<html>
<head>
  <title>Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
      * {box-sizing: border-box;}
      body {
        font-family: Verdana, sans-serif;
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
      }


      .mySlides {display: none;}
      img {vertical-align: middle;}


      .fixed-background {
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          overflow: hidden;
      }

      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        margin-top: 170px;
        margin-left: 370px;
        position: relative;
      }

      .myimg {
          height: inherit;
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: none;
        transition: background-color 0.6s ease;
      }

      .active {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
      }

  </style>
</head>
<body>
    <div class="fixed-background">

        <?php 

            include("backend.php");
            $countImage = count($img);
        
            /*$countImage = count(glob("Images/*.{jpg,png}",GLOB_BRACE));
            $array_jpg = array();
            $array_jpg = glob("Images/*.{jpg,png}",GLOB_BRACE);*/

            for ($i=0; $i < $countImage ; $i++) { 
        ?>


        <div class="mySlides fade">
          <div class="numbertext"><?php echo $i+1; ?> / <?php echo $countImage; ?></div>
          <img src="Images/<?php echo $img[$i]; ?>" class="myimg" style="width:100%"/>
        </div>

        <?php } ?> 

    </div>
    <br>

    <div style="text-align:center">
      <?php for ($j=0; $j < $countImage ; $j++) { ?>
        <span class="dot"></span> 
     <?php } ?>
    </div>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    </script>

</body>
</html> 
