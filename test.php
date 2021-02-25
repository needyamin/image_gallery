<?php

include"database/db.php";


//insert pdf   
if(isset($_FILES['fileUpload']['name'])) {     
if(!empty($_FILES['fileUpload']['name'])){    
foreach($_FILES['fileUpload']['name'] as $i => $fileUpload) 
{ 
// Get values from post.
$img = $fileUpload;
$date = date('Y-m-d');    
$ip_address = $_SERVER['REMOTE_ADDR'];        

    
$check ="SELECT * FROM images where image_name = '$img'";
$stmt = $con->prepare($check); 
$stmt->execute();
$count = $stmt->fetchColumn();
if($count > 0){   
echo"WRONG";}   
    
else {
    
$sql_file ="INSERT INTO `images` (`id`, `gallery_id`, `image_name`, `date`) VALUES (NULL, '0', '$img', '$date') ";
    
$stmt = $con->prepare($sql_file);   
$stmt->execute();         
echo"<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Your post have been published successfully!</div>";    
}

}
    
    
 }};?>
  
       
       <form method="POST" enctype="multipart/form-data">
            <input type="file" name="fileUpload[]" multiple>
            <input type="submit" value="Upload">
        </form>