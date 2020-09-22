<?php
  require "../includes/config.php";
  require "../registration/db_.php";
?>
<!DOCTYPE html>
<html>
    <head>
   	<meta charset="utf-8">
   	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
   	<link rel="stylesheet" href="../css/style.css">

    <title><?php echo $config['title'];?></title>
    </head>

    <body>


    	<?php include "../includes/header.php"; ?>



     <div class="wrapper">
    	<div class="content">
    	  <div class="container">
    	   	  <?php include "../includes/feedback_page.php"?>  	

    	   </div>    		
    	  </div>
           

           <?php include "../includes/footer.php"; ?>
   
	


   
    </body>
</html>