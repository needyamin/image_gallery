<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 0px solid #5e5e5e;
}
    
.filter-button
    
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
    
{ 
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;
}
    
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
</style>



 <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="hdpe">Nuture</button>
            <button class="btn btn-default filter-button" data-filter="sprinkle">Social Pics</button>
            <button class="btn btn-default filter-button" data-filter="spray">Science</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Nuture</button>
        </div>
        <br/>
            

<?php             
       include"database/db.php";    
       $i ='1';                                    
       $sqlxx = 'SELECT * FROM gallery';
       $stmt = $con->prepare($sqlxx);   
       $stmt->execute();
       if ($stmt->rowCount() > 0) {
// output data of each row
while ($table = $stmt->fetch()) {;?>     
                                             

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="models/<?php echo $table['gallery_username'];?>/<?php echo $table['gallery_img'];?>" style="border:2px solid black;width: 280px; height:280px;"> 
                <div class="gallery-title" style="margin-left:-20%;"> <?php echo $table['gallery_username'];?> </div>
            </div>

            
            <?php }} else{$message = "error";};?> 
            
        </div>
    </div>



<script> $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});</script>
