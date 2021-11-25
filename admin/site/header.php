<head>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='description' content='' />
        <meta name='author' content='' />
        <title>Dashboard - Image Gallery</title>
        <link href='site/css/styles.css' rel='stylesheet' />
        <link href='site/css/dataTables.bootstrap4.min.css' rel='stylesheet' crossorigin='anonymous' />
        <script src='site/js/all.min.js' crossorigin='anonymous'></script>
    </head> 


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="gallery.php">ADMIN PANEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="upload.php">Single Upload</a>
      <a class="nav-item nav-link disabled" href="login.php">Welcome <?php if(!$_SESSION['username']){echo 'Guest';} else{echo $_SESSION['username'];}?>!</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

</div>
