<?php
 $title='Service Type';
  include('header.php');
   include('include/db.php');
   include('include/function.php');

include('_secure.php');
  
 if(isset($_POST['Add_ser_type']))
     {
        extract($_POST);
    $insert = "insert into services_type(Services_Name) 
     VALUES('".$Services_Name."')";

     $query = $db->query($insert);
   if($query){
   include('SMS/Change_password.php');
   }
  
};
if(isset($_GET["SNaction"]))
{

$sel="DELETE FROM services_type WHERE Id ='".$_GET["ID"]."' ";
$objExecute=$db->query($sel);
  // if($info){
   if($objExecute)
   {

     include('SMS/Successful_Delete.php');

   }
   header("location:Register_Services.php");
   
}




    ?>

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
        <li class="breadcrumb-item active">Catatan Semua Jenis Layanan</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
    
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"></i>  Tambah Layanan</div>
        <div class="card-body">
          <form action="" method="POST" >
          <div class="row">
            
         
          <div class="form-group col-lg-6">
            <label for="">Nama Layanan </label>
            <input type="text"  class="form-control" name="Services_Name" required=""  placeholder="Masukkan Jenis Layanan">
          </div>
         
           <div class="form-group col-lg-6">
            <label for="">Kirim </label>
            <input type="Submit"   class="form-control btn btn-primary" name="Add_ser_type">
          </div>
        </div>
       </form> 
        </div>
        
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Catatan Semua Layanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Layanan</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              
              
              <tbody>
                <?php
                 $Show=Serv_typ_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td><a 
                   onclick="return confirm('Are you sure you want to delete this entry?')"
                    href="Register_Services.php?SNaction&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Hapus</a></td>
                </tr>
                <?php  # code...
                 };?>
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
