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
    
    
<style>
img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>
    
    
    
    
    
    
    
<body>
    
     
    
<div class="container-fluid">
    
    
<div class="text-center">  
<h1> Website Name</h1>
    <hr>
    
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
 <?php include"database/db.php";?>    
    
     <?php                            
       $sqlxx = 'SELECT * FROM gallery';
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
// output data of each row
           
while ($table = $stmt->fetch()) {;?>  

 <div class="col-xs-6 col-md-3 p-1">
<div class="card"> 
 
    <div class="text-center"> 
    <a href="view.php?username=<?php echo $table['gallery_username'];?>">  
    <img src="models/<?php echo $table['gallery_username'];?>/<?php echo $table['gallery_img'];?>" style="width:200px;height:196px;border:2px solid black;"></a>  
    </div>
  
    <div class="card-header" style="color:blue;">
    <?php echo $table['gallery_username'];?>
  </div>  
    
    </div> 
    </div>
      <?php }};?>     
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
