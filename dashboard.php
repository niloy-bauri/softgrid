<?php
include 'header.php';
$count_request=$main->numRows('api_analyze');
$count_user=$main->numRows('user');
$api_analyze_data=$main->getAll('api_analyze');
$user_data=$main->getAll('user');
?>
        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL API REQUEST</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_request?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                 <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL USER</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_user?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                API URL</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><code>http(s)://www.domain name/api.php?request=countryList&access_token=user access token</code></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 </div>
                    <!-- Content Row -->
   <div class="container-fluid">
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                               
                                        <form>
  <div class="form-group row">
      <label class="col-4">User</label>
    <div class="col-8">
      <select id="user" name="user" class="custom-select">
          <option value="">--Select--</option>
          <?php 
          foreach ($user_data as $user_dataz) { ?>
          <option value="<?=$user_dataz->access_token?>"><?=$user_dataz->name?></option>
          <?php }
          ?>
          
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-4">Strat Date</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
          <input id="start_date" name="start_date" type="date" class="form-control">
      </div>
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
        <button name="button" id="filter" type="button" class="btn btn-primary">Filter</button>
    </div>
  </div>
</form>
                                   
                                <!-- Card Body -->
                                                           </div>
                        </div>

                        <!-- Pie Chart -->
                       
                    </div>
                    </div>

                     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
          

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">API REQUEST</h6>
                        </div>
                        <div class="card-body">
                            <h2>TOTAl API REQUEST: <span id="total"><?=$count_request?></span></h2>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablxe" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="tbody">
                                        <?php 
                                        $i=1;
                                        foreach ($api_analyze_data as $api_analyze_dataza) {
                                           $get_user=$main->fetchSingle("user","access_token='$api_analyze_dataza->access_token'"); 
                                        
                                        
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$get_user->name?></td>
                                            <td><?=date('jS M Y H:i a', strtotime($api_analyze_dataza->date))?></td>
                                            
                                        </tr>
                                        <?php $i++; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                 <div class="container-fluid">

                    <!-- Page Heading -->
          

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablxe" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Access Token</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="">
                                        <?php 
                                        $i=1;
                                        foreach ($user_data as $user_datas) {
                                        
                                        
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$user_datas->name?></td>
                                            <td><?=$user_datas->access_token?></td>
                                            
                                        </tr>
                                        <?php $i++; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<?php 
include 'footer.php';
?>