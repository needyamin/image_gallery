<?php 
  $get_id = $_GET['editID'];
  include"../database/db.php";
  session_start();
  $query = "SELECT * FROM admin";
  $stmt = $con->prepare($query);
  $stmt->execute();
  $row = $stmt->fetch();
  $usr = $row['username'];
  if ($_SESSION['username'] == $usr){
  include"site/header.php";?>



<body> 
     <main>
         <div class="container">
       
             <ol class="breadcrumb mb-2">
                 <li class="nav-item nav-link active"><a href='gallery.php'>Gallery</a> > RENAME</li>
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
///////////////


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
$gallery_head_name = $_POST['gallery_head_name'];
$gallery_description = $_POST['gallery_description'];
$gallery_tags = $_POST['gallery_tags'];
$gallery_fb = $_POST['gallery_fb'];
$gallery_twitter = $_POST['gallery_twitter'];
$gallery_instragram = $_POST['gallery_instragram'];
$gallery_other = $_POST['gallery_other'];
$gallery_date = date('Y-m-d');    
    
    
 $sql = "UPDATE `gallery` SET 
 `gallery_head_name` = '$gallery_head_name',
 `gallery_description`= '$gallery_description',
 `gallery_tags` = '$gallery_tags',
 `gallery_fb` = '$gallery_fb', 
 `gallery_twitter` ='$gallery_twitter', 
 `gallery_instragram`= '$gallery_instragram', 
 `gallery_other` = '$gallery_other', 
 `gallery_ip`= '$gallery_ip', 
 `gallery_date` = '$gallery_date' WHERE `gallery`.`g_id` = '$get_id'";
    
$stmt = $con->prepare($sql);   
$stmt->execute();        

$message = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Data Has Been Updated!</div>";    


    
}
?>
       


<?php echo $message;?>                   
                        
<!-- modal start-->
 <form action="" method="POST"> 
    
<?php   

$sql ="SELECT * FROM gallery WHERE g_id='$get_id'";
$stmt = $con->prepare($sql);   
$stmt->execute();   
while($table = $stmt->fetch()){;?>    
            
 <div class="row">
    <div class="col">      
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><span class="text-muted">Update Name: </span></label>
            <input type="text" class="form-control" name="gallery_username" value="<?php echo $table['gallery_username'];?>" disabled>
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><span class="text-muted">Update Title:</span></label>
            <input type="text" class="form-control" name="gallery_head_name" value="<?php echo $table['gallery_head_name'];?>">
          </div>
        
        
          <div class="form-group">
            <label for="message-text" class="col-form-label"><span class="text-muted">Update Tags:</span></label>
            <input type="text" class="form-control" name="gallery_tags" value="<?php echo $table['gallery_tags'];?>" rows="6"></input>
          </div>
        </div>    
              
        
<div class="col">
            
 <div class="input-group mb-3" style="margin-top:38px;">
  <div class="input-group-prepend">
    <span class="input-group-text">https://facebook.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_fb" value="<?php echo $table['gallery_fb'];?>" aria-describedby="basic-addon3">
</div>
                    
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">https://twitter.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_twitter" value="<?php echo $table['gallery_twitter'];?>" aria-describedby="basic-addon3">
</div>
                                
                    
       
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">https://instragram.com/</span>
  </div>
  <input type="text" class="form-control" name="gallery_instragram" value="<?php echo $table['gallery_instragram'];?>" aria-describedby="basic-addon3">
</div>
                                
                    
<div class="form-group">
    <label for="message-text" class="col-form-label">Other</label>
  <input type="text" class="form-control" name="gallery_other" value="<?php echo $table['gallery_other'];?>" placeholder="Enter Website URL">
      </div>    

 </div>
       

<!----------> 
        
        <div class="row col-12 p-3">
            <label class="text-muted">Description:</label><br>
            <textarea name="gallery_description" style="width:100%; padding:10px;"><?php echo $table['gallery_description'];?></textarea>
          </div>     
        

        
        
 <input type="submit" name="submit" value="Submit" style="background:blue;color:white;width:100%;padding:5px;">  </div>     
        
      
      
      
      
      
      
</form>  
<?php };?>  
<!-- ##################################gallery Modal End##################################-->
<!-- modal end-->

              
 <?php include"site/footer.php";?>
<?php } else {echo"Please <a href='login.php'>login</a> first..";} ;?>
