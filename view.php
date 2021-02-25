<!DOCTYPE HTML>
<html>
<head>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='description' content='' />
        <meta name='author' content='' />
        <title>Dashboard - Image Gallery</title>
        <link href='admin/site/css/styles.css' rel='stylesheet' />
        <link href='admin/site/css/dataTables.bootstrap4.min.css' rel='stylesheet' crossorigin='anonymous' />
        <script src='admin/site/js/all.min.js' crossorigin='anonymous'></script>
    </head> 
    
    
    
<body>
    
    
    
    
<div class="container-fluid">
    
    
<div class="text-center">  
<h1> <?php echo $get_username = $_GET['username'];?>'s Profile</h1>
    <hr>
    
<div class="row">    
<div class="col"> 
<div class="card"> 
   Yamin <br> 
    
    name <br> 
    Facebook id <br> 
    </div>
    
    </div></div>    
    
<div class="row">
    
    
    
<!-- col start-->    
<div class="col-sm-2">

 <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Table Content 1</li>
    <li class="list-group-item">Table Content 2</li>
    <li class="list-group-item">Table Content 3</li>
  </ul>
</div>   
    
</div>
    
<!-- ///////////// -->    

<!--<div class="row">
    <div class="col-xs-6 col-md-3"></div>
    <div class="col-xs-6 col-md-3"></div>
</div>-->


    
    
    
    
<div class="col-sm-8">   
<!-- grid dynamic start-->     
        
<div class="row">
    
 <?php 
    $get_username = $_GET['username'];
    include"database/db.php";

//check folder and move file on folder start//    
$check1 ="SELECT * FROM gallery where gallery_username = '$get_username'";
$stmt = $con->prepare($check1); 
$stmt->execute();      
$tablex = $stmt->fetch();
$g_id = $tablex['g_id']; //fetchtable
$gallery_username = $tablex['gallery_username']; //fetchtable     
//check folder and move file on folder end//  
?>    
    

<?php                            
       $sqlxx = "SELECT * FROM images Where gallery_id = '$g_id'";
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
// output data of each row
           
while ($table = $stmt->fetch()) {;?>  




 <div class="col-xs-6 col-md-3 p-1">
<div class="card"> 
 
    <div class="text-center"> 
  <a class="fancybox-thumb" rel="fancybox-thumb"  href="models/<?php echo $get_username;?>/<?php echo $table['image_name'];?>"> <img src="models/<?php echo $get_username;?>/<?php echo $table['image_name'];?>" style="width:200px;height:196px;border:2px solid black;" onerror="this.src='default-image.jpg'" > </a>

    </div>
  





<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/imagegallery/fancybox/lib/jquery.mousewheel.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/imagegallery/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
<script type="text/javascript" src="/imagegallery/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/imagegallery/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/imagegallery/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/imagegallery/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/imagegallery/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/imagegallery/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


<script type="text/javascript">
	$(document).ready(function() {
	$(".fancybox-thumb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});
});
</script>







    <div class="card-header" style="color:blue;">
    <?php echo $gallery_username;?>
  </div>  
    
    </div> 
    </div>
      <?php }} else {echo'0 records found';};?>     
    </div>  

 <!-- grid dynamic stop-->     
   
 </div>  
    
    
    
    
    
    
    
    
<div class="col-sm-2">

  <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Table Content 1</li>
    <li class="list-group-item">Table Content 2</li>
    <li class="list-group-item">Table Content 3</li>
  </ul>
</div>   
       
    
    
</div>
    
<!-- col end-->   
    
</div>        
</div>    
</div> 
    
</body>    

</html>
