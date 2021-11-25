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
$check1 ="SELECT * FROM gallery where gallery_username='yamin'";
$stmt = $con->prepare($check1); 
$stmt->execute();      
$table = $stmt->fetch();
$foldername = $table['gallery_username']; //fetchtable
//check folder and move file on folder end//        
        
//hit upload on storage 124424
move_uploaded_file($filetempname,"../models/$foldername/".$filename);

$sql_file ="INSERT INTO `images` (`id`, `gallery_id`, `image_name`, `date`) VALUES (NULL, '0', '$img', '$date') ";
    
$stmt = $con->prepare($sql_file);   
$stmt->execute();         
$message = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Your post have been published successfully!</div>";      
}
}
 }};?>
  

          <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Upload Photos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Gallery</li>
                            <li class="breadcrumb-item active">Upload</li>
                        </ol>
       
                        

                  
                             
 <form method="POST" enctype="multipart/form-data">
     
     
<!--- //////////////////////////////////////////////// -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="container">
    <div class="card p-4"> 
	<div class="row">
        <div class="col">
	    <form class="col-md-4">
	        <label>Select Gallery Name</label>
	        <select class="form-control select2">
		 <option>Select</option> 

		   <?php 
		      $check ="SELECT * FROM gallery";
              $stmt = $con->prepare($check); 
              $stmt->execute();    
              while ($table = $stmt->fetch()) { echo'<option>'.$table['gallery_username'].'</option>';};?>
					
			   
	           
	         

	        </select>
	    </form>
        </div> 
     <div class="col"> </div>    
 	</div>
     

<script>
    $('.select2').select2();
</script>
     
<!--- //////////////////////////////////////////////// -->     
     
     
     
     <hr>
     <div class="form-group">
      <input type="file" name="fileUpload[]" multiple required>
     <input type="submit" value="Upload"></div>
      <hr>  
     </div></div>
        </form>
    <?php echo $message;?>


                        
                        
<?php include"site/footer.php";?>

<?php } else {echo"Please <a href='login.php'>login</a> first..";} ;?>
