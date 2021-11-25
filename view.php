<?php include"database/db.php";?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='description' content='' />
        <meta name='author' content='' />
        <title>Dashboard - Image Gallery</title>
         
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href='boostrap/custom.css' rel='stylesheet'/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head> 
    
     
<body>
	
<div class="container-fluid">


<div class="text-center">  
   <h1><?php echo $get_username = $_GET['username'];?>'s Gallery</h1><hr>
    
  <div class="p-1"><a href="index.php"><span style="text-align:left; padding:5px;">Go Home</span></a> </div> 
    <hr>
    
 <?php  
       $get_username = $_GET['username'];
       $checki ="SELECT * FROM gallery where gallery_username = '$get_username'";
       $makeready = $con->prepare($checki); 
       $makeready->execute();      
       $tableX = $makeready->fetch();
       
       
       $gallery_fb = $tableX['gallery_fb'];
       $gallery_twitter = $tableX['gallery_twitter'];
       $gallery_instragram = $tableX['gallery_instragram'];
       $gallery_other = $tableX['gallery_other '];
  
       
       if (!$gallery_fb AND !$gallery_twitter AND !$gallery_instragram) {} else {;?>  
		   
    <div class="card"> 
          <div class="row">    
                 <div class="col"> 
                   
	
	                      <div class="row p-2 text-muted"> 
	                          <div class="col-6" style="text-align: left;"> <br>
	                          <img src="models/<?php echo $tableX['gallery_username'];?>/<?php echo $tableX['gallery_img'];?>" width="200">
	                          <br> Gallery Info: <?php echo $tableX['gallery_head_name'];?>
	                          <br> Created: <?php echo $tableX['gallery_date'];?>
	                          
	                          </div>
	                            
	                          <!--<div class="col-4"> <br> <br> Are you looking more photos? <br></div>-->
	                          
	                              <div class="col-6" style="text-align: right;"> 
							
 <?php if(!$gallery_fb){} else{ echo "<a href='https://www.facebook.com/$gallery_fb'>"."<i class='fa fa-facebook p-2'></i>"."</a>"; };?>
 <?php if(!$gallery_instragram){} else{ echo "<a href='https://www.instragram.com/$gallery_instragram'>"."<i class='fa fa-instagram p-2'></i>"."</a>"; };?>
<?php if(!$gallery_twitter){} else{ echo "<a href='https://www.twitter.com/$gallery_twitter'>"."<i class='fa fa-twitter p-2'></i>"."</a>"; };?>

<?php if(!$gallery_other){} else{ echo "<a href='$gallery_other'>"."<i class='fa fa-dribbble p-2'></i>"."</a>"; };?>
	                              
	                                     </div></div></div></div>
	                                 
	
<div class="row"><p class="p-4" style="text-align:justify;text-justify: inter-word;word-break: break-all;">
	<?php echo $tableX['gallery_description'];?>
	<br>
	 Tags:<b> <?php echo $tableX['gallery_tags'];?> </b> </p></div> </div>
	                                 
	  <?php };?>
    
    
    
<div class="row p-2"> 
	
<div class="col-sm-2">
<div class="card" style="background:blue; height:500px;">
</div>   
    
</div>
    

    
    
<div class="col-sm-8">   
<!-- grid dynamic start-->     
        
<div class="row">
    
 <?php 
       
       $get_username = $_GET['username'];

   
       $check1 ="SELECT * FROM gallery where gallery_username = '$get_username'";
       $stmt = $con->prepare($check1); 
       $stmt->execute();      
       $tablex = $stmt->fetch();
       $g_id = $tablex['g_id']; //fetchtable
       $gallery_username = $tablex['gallery_username']; //fetchtable     
    
                     
       $limit = 12;
       
       if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
       $start_from = ($page-1) * $limit;  
                      
       $rowCount = "SELECT * FROM images Where gallery_id = '$g_id'"; 
       $stmt = $con->prepare($rowCount);   
       $stmt->execute();
       $total_records = $stmt->rowCount();
       $total_pages = ceil($total_records / $limit);
      
      
       $x = "SELECT * FROM images Where gallery_id = '$g_id' LIMIT $start_from, $limit"; 
       $fetchIMG = $con->prepare($x);   
       $fetchIMG->execute();
       
       $xxI ="SELECT * FROM gallery where gallery_username = '$get_username'";
       $XU = $con->prepare($xxI);   
       $XU->execute();
       $fire = $XU->fetch();
       $page_gallery_name = $fire['gallery_username'];
       
       
       if ($fetchIMG->rowCount() > 0) {
       while ($table = $fetchIMG->fetch()) {;?>  


     <div class="col-xs-6 col-md-3 p-1">
       <div class="card"> 
 
    <div class="text-center"> 
         <a  data-fancybox="gallery" data-src="models/<?php echo $get_username;?>/<?php echo $table['image_name'];?>" data-caption="<?php echo $table['image_name'];?>"> <img src="models/<?php echo $get_username;?>/<?php echo $table['image_name'];?>" style="width:200px;height:196px;border:2px solid black;" onerror="this.src='default-image.jpg'" > </a>

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
      <?php }} else {;?> <style>#thepagination{display:none;} </style><div class="container" style="padding:10px;"><div class="card" style="padding:25px;font-size:22px;"> <h2>There is No Photo Uploaded On this Gallery! </h2><br> <img src='no.gif' style='width:400px;height:400px;margin:0 auto;'></div></div> <?php };?>     
    </div>  

 <!-- grid dynamic stop-->  


      

<div class="row" id="thepagination"> <div class="col-6">  


       <ul class="pagination">
           <li><a href="?username=<?php echo $page_gallery_name;?>&page=1">First</a></li>
           
           <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
               <a href="<?php if($page <= 1){ echo '#'; } else { echo "?username=$page_gallery_name&page=".($page - 1); } ?>">Prev</a>
                  </li>
                  
           <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
               <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?username=$page_gallery_name&page=".($page + 1); } ?>">Next</a>
           </li>
           
           <li><a href="?username=<?php echo $page_gallery_name;?>&page=<?php echo $total_pages; ?>">Last</a></li>
              </ul>   
   
   </div>
   
   
  <div class="col-6"><small class="text-muted">Showing <?php echo $page;?> to <?php echo $limit;?> of  <?php echo $total_records;?> </small>
</div>
   
   </div>
   
   
   
               </div>  
    
    
    
    
    
    
    
    
<div class="col-sm-2">

<div class="card">
<div class="card" style="background:blue; height:500px;">
</div>   
       
</div>
    
<!-- col end-->   
    
</div>        
</div>    
</div> 




    
    
 <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
      //  JavaScript will go here
    </script>   
</body>    



<?php include"admin/site/footer.php";?>

</html>
