<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('registered/layouts/header');
    ?>
    
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

    <?php   
      $this->load->view('registered/layouts/csshandler');
    ?>

    

  </head>

  <body class="">

      <!-- Menu Bar Top -->
      <?php $this->load->view('registered/layouts/menubartop');  ?>

      <div class="page-container row-fluid">
        <!-- aside -->
        <?php $this->load->view('registered/layouts/menubar');  ?>
        


        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">

          <div class="content">


              <div class="row-fluid">
                <div class="span12">
                  <div class="grid simple ">
                    <div class="grid-title">
                      <h4>DAFTAR SEMUA PESERTA</h4>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <!-- <a href="#grid-config" data-toggle="modal" class="config"></a> -->
                        <!-- <a href="javascript:;" class="reload"></a> -->
                        <!-- <a href="javascript:;" class="remove"></a> -->
                      </div>
                    </div>
                    <div class="grid-body ">
                      <table class="table table-striped" id="example2">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Phone Number</th>
                            <th>Country</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($peserta as $key => $value) {
                          ?>    
                              <tr class="">
                                <td><?php echo($value['id']) ?></td>
                                <td><?php echo($value['fullname']) ?></td>
                                <td><?php echo($value['phone_number']) ?></td>
                                <td class="center"><?php echo($value['country']) ?></td>
                                <td class="center">Belum tersedia</td>
                              </tr>

                          <?php  }
                          ?>


                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


          </div>
        </div>
        <!-- END PAGE CONTAINER -->
      </div>



    <!-- jshandler -->
    <?php $this->load->view('registered/layouts/jshandler');  ?>

     <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <!-- END PAGE LEVEL JS INIT -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->


  </body>
</html>
