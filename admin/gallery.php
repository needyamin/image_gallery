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


<style> 
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-size:14px;
}
::-moz-placeholder { /* Firefox 19+ */
  font-size:14px;
}
:-ms-input-placeholder { /* IE 10+ */
  font-size:14px;
}
:-moz-placeholder { /* Firefox 18- */
  font-size:14px;
}
</style>

<body> 
     <main>
         <div class="container">
       
             <ol class="breadcrumb mb-2">
                 <li class="nav-item nav-link active">Gallery</li>
                      </ol>
                       
             
             
                    
                        

<?php

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


function fresh( $string, $separator = ' ')
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



function tags( $string, $separator = ',')
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
    
//IP Address GEt    
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{$ip_address = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else{$ip_address = $_SERVER['REMOTE_ADDR'];}    
//////////////////////////5200///////////////////
    
    
$gallery_username = format_slug($_POST['gallery_username']);
$gallery_head_name = fresh($_POST['gallery_head_name']);
$gallery_description = fresh($_POST['gallery_description']);
$gallery_tags = tags($_POST['gallery_tags']);
$gallery_fb = fresh($_POST['gallery_fb']);
$gallery_twitter = fresh($_POST['gallery_twitter']);
$gallery_instragram = fresh($_POST['gallery_instragram']);
$gallery_other = fresh($_POST['gallery_other']);
$gallery_date = date('Y-m-d');    
    
   
$check = "SELECT * FROM WHERE gallery_username = '$gallery_username'";
$stmt = $con->prepare($check);   
$stmt->execute();   
$data = $stmt->fetch();
$me = $data['gallery_username']; 

if ($me = $gallery_username) {$message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Wrong!</strong> Gallery Name '$gallery_username' already exists!</div>";
	
//Detect Current URL Path
$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);   

//Javascript redirect after 5 sec    
echo $success ="<script>
         setTimeout(function(){
            window.location.href = '$path/gallery.php';
         }, 5000);
      </script>";    	
	
}	    
  
//=====================888==========================> 
//check folder start//
if (!file_exists("../models/$gallery_username")) {
    mkdir("../models/$gallery_username", 0777, true);

//check folder end xxxxxxxxxxxxxxxxxxxxxxxxxxx //    
//profile moved (upload)
$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"../models/$gallery_username/".$file_name);  
//====================888=========================>      
    
    
$sql = "INSERT INTO `gallery` (`g_id`, `gallery_username`, `gallery_head_name`, `gallery_description`,`gallery_tags`, `gallery_img`, `gallery_fb`, `gallery_twitter`, `gallery_instragram`, `gallery_other`, `gallery_ip`, `gallery_date`) VALUES (NULL, '$gallery_username', '$gallery_head_name', '$gallery_description','$gallery_tags', '$file_name', '$gallery_fb', '$gallery_twitter', '$gallery_instragram', '$gallery_other', '$ip_address', '$gallery_date')";
    
$stmt = $con->prepare($sql);   
$stmt->execute();        

$message = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> New Gallery Successfully Added!</div>";    


//Detect Current URL Path
$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);   

//Javascript redirect after 5 sec    
echo $success ="<script>
         setTimeout(function(){
            window.location.href = '$path/gallery.php';
         }, 5000);
      </script>";    
    
}}

?>
       
                   
                        
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
            <label for="recipient-name" class="col-form-label"><span class="text-muted">Create Name: </span></label>
            <input type="text" class="form-control" name="gallery_username" placeholder="Gallery Name" required>
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><span class="text-muted">Create Title:</span></label>
            <input type="text" class="form-control" name="gallery_head_name" placeholder="Gallery Title">
          </div>
        
        
          <div class="form-group">
            <label for="message-text" class="col-form-label"><span class="text-muted">Description:</span></label><br>
            <textarea maxlength="" name="gallery_description" style="width:100%;"></textarea>
          </div>
         
         
         
          <div class="form-group">
            <label for="message-text" class="col-form-label"><span class="text-muted">Tags:</span></label>
            <input type="text" class="form-control" name="gallery_tags" placeholder="Apple,Banana, etc..." rows="6"></input>
          </div>
         
         
         
        
        </div>    
              
        
        <div class="col">
            
            
        <div class="form-group">
           
            <label for="message-text" class="col-form-label"><span class="text-muted">Upload Cover Image <i class="fa fa-chevron-down" aria-hidden="true"></i> </span></label>
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
            Advance Option: <br>
              <input type="checkbox" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <label> YES</label>   <input type="checkbox"> <label> NO</label>
              
              
              
                    </div>    
                   </div>
                   
  <div class="collapse m-3" id="collapseExample">
    
                 
                    
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">https://facebook.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_fb" aria-describedby="basic-addon3">
</div>
                    
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">https://twitter.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_twitter" aria-describedby="basic-addon3">
</div>
                                
                    
       
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">https://instragram.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_instragram" aria-describedby="basic-addon3">
</div>
                                
                    
                    
                    
         <div class="form-group">
            <label for="message-text" class="col-form-label">Other</label>
            <input type="text" class="form-control" name="gallery_other" placeholder="Enter Website URL">
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
                    <div class="card-header"><i class="fas fa-table mr-1"></i> Gallery Folders</div>
                   <div class="card-body">
                            
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                             <thead>
                                 <tr>
                                      <th>SR</th>
                                      <th>Gallery Name</th>
                                      <th>Gallery Image</th>
                                      <th>Total Images</th>
                                      <th>Gallery Create Date</th>
                                      <th>Gallery  IP</th>
                                      <th></th>
                                      </tr>
                                        </thead>
                                          <tbody>
                                            
                                            
<?php 
     if(isset($_GET['delete'])){                                        
     $del = $_GET['delete'];

     /////////////////////////////////////////////////////////////    
     $delfolder = "SELECT * FROM gallery WHERE g_id='$del'";
     $stmt = $con->prepare($delfolder);   
     $stmt->execute();
     $tablexx = $stmt->fetch();
     $fname = $tablexx['gallery_username'];
 
//check folder start//
@ array_map('unlink', glob("../models/$fname/*"));
@ rmdir("../models/$fname");             
      
     ////////////////////////////////////////////       
     $sqldel = "DELETE FROM gallery WHERE g_id = '$del'";
     $stmt = $con->prepare($sqldel);   
     $stmt->execute();

     $message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Deleted!</strong> Gallery ID '$del' has been successfully deleted!</div>";     
     
     //Detect Current URL Path
     $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
     $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);   

     //Javascript redirect after 5 sec    
     echo $success ="<script>
         setTimeout(function(){
            window.location.href = '$path/gallery.php';
         }, 5000);
        </script>"; 
         
      }                                       
                                            
       $i ='1';                                    
       $sqlxx = 'SELECT * FROM gallery ORDER BY g_id DESC';
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
       // output data of each row
       while ($table = $stmt->fetch()) {
	   $g_id = $table['g_id']; //Stored Gallery ID
	   ;?>     
                                             
                                            
            <tr>
            <td><?php echo $i++;?></td>
            <td><a href="get_upload.php?username=<?php echo $table['gallery_username'];?>"><?php echo $table['gallery_username'];?></a></td>
            <td><img src="../models/<?php echo $table['gallery_username'];?>/<?php echo $table['gallery_img'];?>" width="50"></td>
            <td>
	             <?php                            
                  $sq = "SELECT COUNT(image_name) AS total_image FROM images WHERE gallery_id = '$g_id'";
                  $stmtx = $con->prepare($sq);$stmtx->execute();
                  $tablex = $stmtx->fetch(); echo $tablex['total_image'];?> 
				 
			 </td>
				 
				 
            <td><?php echo $table['gallery_date'];?></td>
            <td><?php echo $table['gallery_ip'];?></td>
               <td><a href="rename.php?editID=<?php echo $table['g_id'];?>"> Edit</a> </td>    
                <td><a href="?delete=<?php echo $table['g_id'];?>"> Delete</a> </td>    
            </tr>
       <?php }};?>      
                                            
                    <?php echo $message;?>                    </tbody>
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                </main>
              
              </body>
              
                <?php include"site/footer.php";?>

<?php } else {echo"Please <a href='login.php'>login</a> first..";} ;?>
