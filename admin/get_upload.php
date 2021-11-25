<?php
  include"../database/db.php";
  session_start();
  $query = "SELECT * FROM admin";
  $stmt = $con->prepare($query);
  $stmt->execute();
  $row = $stmt->fetch();
  $usr = $row['username'];
  if ($_SESSION['username'] == $usr){
  include"site/header.php";?>
  
  
<?php

include"sidebar.php";

$get_upload = $_GET['username'];
$message ="";

//insert pdf   
if(isset($_FILES['fileUpload']['name'])) {     
if(!empty($_FILES['fileUpload']['name'])){    
foreach($_FILES['fileUpload']['name'] as $i => $fileUpload) 
{ 

//file name and temp start 124424//    
$filename = $_FILES['fileUpload']['name'][$i];
$filesize = $_FILES['fileUpload']['size'][$i];
$filetempname = $_FILES['fileUpload']['tmp_name'][$i];
//file name and temp end//   
    
// Get values from post.
$img = $fileUpload;
$date = date('Y-m-d');    
$ip_address = $_SERVER['REMOTE_ADDR'];        


$check ="SELECT * FROM images where image_name = '$img'";
$stmt = $con->prepare($check); 
$stmt->execute();
$count = $stmt->fetchColumn();
if($count > 0){   
$message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Alert!</strong> You can't upload same image ($img) multiple time</div>";}   
    
else {    
//check username folder start/////////////////////////////////////////////////////////////////////    
$check ="SELECT * FROM gallery";
$stmt = $con->prepare($check); 
$stmt->execute();    
//check username folder end///////////////////////////////////////////////////////////////////////        
         
//check folder and move file on folder start//    
$check1 ="SELECT * FROM gallery where gallery_username='$get_upload'";
$stmt = $con->prepare($check1); 
$stmt->execute();      
$table = $stmt->fetch();
$foldername = $table['gallery_username']; //fetchtable
$g_id = $table['g_id']; //fetchtable   
//check folder and move file on folder end//        
        
//hit upload on storage 124424
move_uploaded_file($filetempname,"../models/$foldername/".$filename);

$sql_file ="INSERT INTO `images` (`id`, `gallery_id`, `image_name`, `date`) VALUES (NULL, '$g_id', '$img', '$date') ";
    
$stmt = $con->prepare($sql_file);   
$stmt->execute();         
$message = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Your post have been published successfully!</div>";      
}
}
 }};?>
  

          <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Upload Photos Into "<?php echo $get_upload;?>"</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="gallery.php">Gallery</a></li>
                            <li class="breadcrumb-item"><a href="#">Upload</a></li>
                            <li class="breadcrumb-item active"><?php echo $get_upload;?></li> 
                        </ol>
       
                        

                  
                             
 <form method="POST" enctype="multipart/form-data">
     
     
     
     <hr>
     <div class="form-group">
      <input type="file" name="fileUpload[]" multiple required>
     <input type="submit" value="Upload"></div>
      <hr> 
        </form>
    <?php echo $message;?>


                        
                        
<?php include"site/footer.php";?>

<?php } else {echo"Please <a href='login.php'>login</a> first..";} ;?>

