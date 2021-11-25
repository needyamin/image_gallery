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
    </head> 
    
    

    
<body>
    
     
    
<div class="container-fluid">
    
    
<div class="text-center">  
<h1> <a href="http://<?php echo $_SERVER[HTTP_HOST];?>">Website Name </a></h1>
<hr>
    
<div class="row">
    
<!-- col start-->    
<div class="col-sm-2">
<div class="card" style="background:blue; height:500px;">
</div>   
    
</div>
    

    
   
<div class="col-sm-8">   
	
<!-- grid dynamic start-->     
        
<div class="row">

    <?php 
       include"database/db.php";
       /////////////////////
       $limit = 12;
       if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
       $start_from = ($page-1) * $limit;  
       /////////////////////

                                
       $sqlxx = "SELECT * FROM gallery LIMIT $start_from, $limit"; /////////////////////
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
       // output data of each row
           
       while ($table = $stmt->fetch()) {;?>  


 <div class="col-xs-6 col-md-3 p-1">
    <div class="card"> 
 
    <div class="text-center"> 
    <a href="view.php?username=<?php echo $table['gallery_username'];?>">  
    <img src="models/<?php echo $table['gallery_username'];?>/<?php echo $table['gallery_img'];?>" style="width:200px;height:196px;border:2px solid black;" id="indeximg"></a>  
    </div>
  
    <div class="card-header" style="color:blue;">
    <?php echo $table['gallery_username'];?>
     </div>  
    
   </div> 
   </div>
    <?php }} else {echo"<h1> PLEASE CREATE YOUR FIRST GALLERY!</h1><h3 class='text-muted'>There Is No Gallery Found! </h3><img src='no.gif' style='width:400px;height:400px;margin:0 auto;'><style>#thepagination,#show{display:none;} </style>";};?>     
    </div>  




   
 <?php 
      $x = "SELECT * FROM gallery"; /////////////////////
      $stmt = $con->prepare($x);   
      $stmt->execute();
      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $limit);?>
      <!-- grid dynamic stop-->     
   


    <small class="text-muted" id="show">Showing <?php echo $page;?> to <?php echo $limit;?>  of  <?php echo $total_records;?> </small>

    <ul class="pagination" id="thepagination">
    <li><a href="?page=1">First</a></li>
    <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
    </li>
    <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
    </ul>

   
   
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
    
</body>    


<?php include"admin/site/footer.php";?>


</html>
