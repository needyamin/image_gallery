<?php 
 include"site/header.php";
 include"sidebar.php"; ?>
       
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                      
                        
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        
                        
                        

                        
                        
        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                            
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Gallery</th>
                                                <th>Country</th>
                                                <th>Start date</th>
                                                <th>IP</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>ID</th>
                                                <th>Name</th>
                                                <th>Gallery</th>
                                                <th>Country</th>
                                                <th>Start date</th>
                                                <th>IP</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nuture</td>
                                                <td>Science</td>
                                                <td>BD</td>
                                                <td>2011/04/25</td>
                                                <td>127.0.0.1</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Social Beauty</td>
                                                <td>Social</td>
                                                <td>US</td>
                                                <td>2011/07/25</td>
                                                <td>127.0.0.1</td>
                                            </tr>
                                           
                                            
                                        </tbody>
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                </main>
              
                <?php include"site/footer.php";?>

