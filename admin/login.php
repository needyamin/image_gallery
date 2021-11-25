<?php
include"../database/db.php";

$error="";
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
  $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $stmt = $con->prepare($query);
  $stmt->execute();
  $row = $stmt->fetch();
    
    if($username == '' or $password == ''){
	$error = "<div class='alert alert-danger' role='alert'>username and password cannot be blank</div>";
	} else{
	//store value	
    $u = $row['username'];
    $p = $row['password'];
    
    if($u == $username And $p == $password){
	 $error = "<div class='success alert-success' role='alert'>Login successfully.. Please 
	 Wait 3 sec..</div>";
	 session_start();
	 $_SESSION['username'] = $_POST['username'];
	 
	 //path
     $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
     $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);   
    
      //Javascript redirect after 5 sec    
      echo $success ="<script>
         setTimeout(function(){
            window.location.href = '$path/gallery.php';
         }, 3000);
       </script>";   
       
	 }else { $error = "<div class='alert alert-danger' role='alert'>please enter right username and password</div>";}
         }
         
	};?>
	



<link href='site/css/styles.css' rel='stylesheet' />
<link href='site/css/dataTables.bootstrap4.min.css' rel='stylesheet' crossorigin='anonymous' />
<script src='site/js/all.min.js' crossorigin='anonymous'></script>
       
<hr width="38%" style="margin-top:5%;">
<h2 align="center"> Admin Panel</h2>
<hr width="38%">

<div class="container"> 
	
<div class="row">
<div class="col-sm-3"></div>
   

<div class="col-sm-6"> 
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Admin Username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <div class="form-group">
  <?php echo $error;?>
  </div>
        
 <input type="submit" name="submit" value="Login" class="btn btn-primary" style="width:100%;">

</form>


</div>   
    
<div class="col-sm-3"></div>    
</div>    
</div>


