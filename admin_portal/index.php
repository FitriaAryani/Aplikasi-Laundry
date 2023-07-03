<?php
include('_secure.php');
 $title='Dashboard';
   include('header.php');
   
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
        
        <!-- <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <div class="mr-5"><?php 
              $total=get_order_status_Count();
              echo $total->num_rows; 
                  ?> Pending Order!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Pending_Order.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      </div>
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Pesanan Tertunda</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pesanan </th>
                  <th>Nama Pelanggan </th>
                  <th>Nomor Telepon </th>
                  <th>Alamat</th>
                  <th>Pick Up Date</th>
                  <th>Delivery Date</th>
                  <th>Total Harga</th>
                  <th>Lihat Pesanan</th>
                  <th>Status Update</th>
                </tr>
              </thead>
              
              <tbody>
                <?php $Show=get_order_status_Count();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;
                   // $Status=$row->status;
                   // // $Boy= $row->Dilvery_Boy_Name;
                    $SID=$row->User_ID;
                    $USer_NAME=$row->User_Name;
                    $QR_code=$row->Order_Code;
                ?>
                <tr>
                  <th><?php echo $count1; ?></th>
                  <th><?php   echo $QR_code;?> </th>
                  <td><?php echo $row->User_Name; ?></td>
                  <td><?php echo $row->Phone_No; ?></td>
                  <td><?php echo $row->Address; ?></td>
                  <td><?php echo $row->Pick_up_date; ?></td>
                  <td><?php echo $row->Delivery_date; ?></td>
                  <td><?php echo $row->Total_Price; ?></td>
                  <th>  <a  data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class=" btn btn-primary">Lihat</a>
                <?php
                     
                     
                 include('view_User_Order_detail.php');?>
                  </th>

                  <td>  <a  data-toggle="modal" data-target="#exampleModalchangestatus<?php echo $count1;?>" class=" btn btn-primary">Ubah Status</a>
                 <?php include('order_status_Update.php');?>

                  </td>
                
                </tr>
                              <?php  # code...
                               }?>
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                     
                    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php');?>
  </div>
</body>

</html>
