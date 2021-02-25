<?php 
//print_r($_POST);
include"site/header.php";
include"sidebar.php"; 

include"../database/db.php";



/////////////
function format_slug( $string, $separator = '-' )
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array( '&' => 'and', "'" => '');
    $string = mb_strtolower( trim( $string ), 'UTF-8' );
    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}
///////////////
//echo format_slug("#@&~^!âèêëadsadsd asdwawa wawdawe wa ewa eaçî");


$message = "";
if(isset($_POST['submit'])){
    
///////////////////////5200//////////////////////
//IP Address GEt    
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{$ip_address = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else{$ip_address = $_SERVER['REMOTE_ADDR'];}    
//////////////////////////5200///////////////////
    
    
$gallery_username = format_slug($_POST['gallery_username']);
$gallery_head_name = $_POST['gallery_head_name'];
$gallery_description = $_POST['gallery_description'];
$gallery_fb = $_POST['gallery_fb'];
$gallery_twitter = $_POST['gallery_twitter'];
$gallery_instragram = $_POST['gallery_instragram'];
$gallery_other = $_POST['gallery_other'];
$gallery_date = date('Y-m-d');    
    
  
//=====================888==========================> 
//check folder start//
if (!file_exists("../models/$gallery_username")) {
    mkdir("../models/$gallery_username", 0777, true);
}

else {

$message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Wrong!</strong> Gallery Name '$gallery_username' already exists!</div>";   
}
//check folder end //    
//profile moved (upload)
$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"../models/$gallery_username/".$file_name);  
//====================888=========================>      
    
    
$sql = "INSERT INTO `gallery` (`g_id`, `gallery_username`, `gallery_head_name`, `gallery_description`, `gallery_img`, `gallery_fb`, `gallery_twitter`, `gallery_instragram`, `gallery_other`, `gallery_ip`, `gallery_date`) VALUES (NULL, '$gallery_username', '$gallery_head_name', '$gallery_description', '$file_name', '$gallery_fb', '$gallery_twitter', '$gallery_instragram', '$gallery_other', '$ip_address', '$gallery_date')";
    
$stmt = $con->prepare($sql);   
$stmt->execute();        

$message = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> New Gallery Successfully Added!</div>";    
    
}

?>
       
       
<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Gallery</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                       
                      
                        

                        
                        
 <!-- modal start-->
            
<button type="button" data-toggle="modal" data-target="#gallery" class="btn btn-primary" style="margin:5px;">Add Gallery</button>
    
<!-- ##################################gallery Modal Start##################################-->
<form action="" method="POST" enctype="multipart/form-data">
<div class="modal draggable fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="galleryLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryLabel">Add New Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!----------> 
          
          
      
 
 
          

    <div class="row">
    <div class="col">      
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gallery Name:</label>
            <input type="text" class="form-control" name="gallery_username" placeholder="Gallery Name" required>
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gallery Title:</label>
            <input type="text" class="form-control" name="gallery_head_name" placeholder="Gallery Title">
          </div>
        
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Gallery Description:</label>
            <textarea class="form-control" name="gallery_description" placeholder="Gallery Description"></textarea>
          </div>
         
        
        </div>    
              
        
        <div class="col">
            
            
        <div class="form-group">
           
            <label for="message-text" class="col-form-label">Cover Image</label>
            <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <br>
            <img id="blah" alt="SELECT IMAGE" src= "" onerror="this.src='default-image.jpg'" width="300" height="300" />
            
          </div> 
             
              
                 </div>
                 </div>   
        
          
      </div>
       
        <!----------> 
        <div class="text-center">
                    <div class="col-sm-12">
                    <button class="btn alert-success btn-sm btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advance Options <i class="fa fa-chevron-down" aria-hidden="true"></i></button> 
                    </div>    
                   </div>
                   
                <div class="collapse m-3" id="collapseExample">
    
      

                 
                    
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://facebook.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_fb" id="basic-url" aria-describedby="basic-addon3">
</div>
                    
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://twitter.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_twitter" id="basic-url" aria-describedby="basic-addon3">
</div>
                                
                    
       
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://instragram.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_instragram" id="basic-url" aria-describedby="basic-addon3">
</div>
                                
                    
                    
                    
         <div class="form-group">
            <label for="message-text" class="col-form-label">Other</label>
            <input type="text" class="form-control" name="gallery_other" placeholder="Enter Twitter Username">
          </div>             
                    
                  </div>
        <!----------> 
        
        
        
        
        
        
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
        
        
    </div>
  </div>
</div>
</form>      
<!-- ##################################gallery Modal End##################################-->
<!-- modal end-->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
       
                        
                        
        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>All Folders</div>
                            <div class="card-body">
                            
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                        <thead>
                                           
      
                                            <tr>
                                                <th>SR</th>
                                                <th>Gallery Name</th>
                                                <th>Gallery Image</th>
                                                <th>Gallery Create Date</th>
                                                <th>Gallery  IP</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            
                                            
<?php 
     if(isset($_GET['delete'])){                                        
     $del = $_GET['delete'];
         
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
     $delfolder = "SELECT * FROM gallery WHERE g_id='$del'";
     $stmt = $con->prepare($delfolder);   
     $stmt->execute();
     $tablexx = $stmt->fetch();
     $fname = $tablexx['gallery_username'];
 
//check folder start//
@ array_map('unlink', glob("../models/$fname/*"));
@ rmdir("../models/$fname");             
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////       
         
     $sqldel = "DELETE FROM gallery WHERE g_id = '$del'";
     $stmt = $con->prepare($sqldel);   
     $stmt->execute();

     $message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Deleted!</strong> Gallery ID '$del' has been successfully deleted!</div>";     
         
     }                                       
                                            
       $i ='1';                                    
       $sqlxx = 'SELECT * FROM gallery ORDER BY g_id DESC';
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
// output data of each row
while ($table = $stmt->fetch()) {;?>     
                                             
                                            
            <tr>
            <td><?php echo $i++;?></td>
            <td><a href="get_upload.php?username=<?php echo $table['gallery_username'];?>"><?php echo $table['gallery_username'];?></a></td>
            <td><img src="../models/<?php echo $table['gallery_username'];?>/<?php echo $table['gallery_img'];?>" width="50"></td>
            <td><?php echo $table['gallery_date'];?></td>
            <td><?php echo $table['gallery_ip'];?></td>
                <td><a href="?delete=<?php echo $table['g_id'];?>"> Delete</a> </td>    
            </tr>
       <?php }};?>      
                                            
                    <?php echo $message;?>                    </tbody>
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                </main>
              
                <?php include"site/footer.php";?>

