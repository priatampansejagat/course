<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('admin/layouts/header');
    ?>
    
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

    <?php   
      $this->load->view('admin/layouts/csshandler');
    ?>

    

  </head>

  <body class="">

      <!-- Menu Bar Top -->
      <?php $this->load->view('admin/layouts/menubartop');  ?>

      <div class="page-container row-fluid">
        <!-- aside -->
        <?php $this->load->view('admin/layouts/menubar');  ?>
        


        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">

          <div class="content">

              <div class="row-fluid" id="formaddmentor">
                <div class="span12">
                  <div class="grid simple ">
                    <div class="grid-title">
                      <h4>Add New Mentor</h4>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <!-- <a href="#grid-config" data-toggle="modal" class="config"></a> -->
                        <!-- <a href="javascript:;" class="reload"></a> -->
                        <!-- <a href="javascript:;" class="remove"></a> -->
                      </div>
                    </div>
                    <div class="grid-body ">
                      
                      <div class="grid-body no-border">
                        <form class="form-no-horizontal-spacing" id="form-condensed">
                          <div class="row column-seperation">
                            <div class="col-md-6">
                              <h4>Basic Information</h4>
                              <div class="row form-row">
                                <div class="col-md-5">
                                  <input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-7">
                                  <input name="form3LastName" id="form3LastName" type="text" class="form-control" placeholder="Last Name">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-7">
                                  <input type="text" placeholder="Date of Birth" class="form-control" id="form3DateOfBirth" name="form3DateOfBirth">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="form3Occupation" id="form3Occupation" type="text" class="form-control" placeholder="Occupation">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-8">
                                  <div class="radio">
                                    <input id="male" type="radio" name="gender" value="male" checked="checked">
                                    <label for="male">Male</label>
                                    <input id="female" type="radio" name="gender" value="female">
                                    <label for="female">Female</label>
                                  </div>
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="form3Email" id="form3Email" type="text" class="form-control" placeholder="email@address.com">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h4>Postal Information</h4>
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="form3Address" id="form3Address" type="text" class="form-control" placeholder="Address">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-6">
                                  <input name="form3City" id="form3City" type="text" class="form-control" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                  <input name="form3State" id="form3State" type="text" class="form-control" placeholder="State">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-8">
                                  <input name="form3Country" id="form3Country" type="text" class="form-control" placeholder="Country">
                                </div>
                                <div class="col-md-4">
                                  <input name="form3PostalCode" id="form3PostalCode" type="text" class="form-control" placeholder="Postal Code">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-4">
                                  <input name="form3TeleCode" id="form3TeleCode" type="text" class="form-control" placeholder="+94">
                                </div>
                                <div class="col-md-8">
                                  <input name="form3TeleNo" id="form3TeleNo" type="text" class="form-control" placeholder="Phone Number">
                                </div>
                              </div>
                              <div class="row small-text">
                                <p class="col-md-12">
                                  This form is used to add a mentor. Mentors that have been added can be deleted in the table.
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="form-actions">
                            <div class="pull-left">
                              
                            </div>
                            <div class="pull-right">
                              <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                              <button class="btn btn-white btn-cons" type="button">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>


                    </div>
                  </div>
                </div>
              </div>



              <div class="row-fluid">
                <div class="span12">
                  <div class="grid simple ">
                    <div class="grid-title">
                      <h4>DAFTAR SEMUA MENTOR</h4>
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
                            foreach ($mentor as $key => $value) {
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
    <?php $this->load->view('admin/layouts/jshandler');  ?>

     <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <!-- END PAGE LEVEL JS INIT -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->

    <script type="text/javascript">
      $("#formaddmentor").hide();
      function addmentor() {
        if ($("#formaddmentor").is(":hidden")) {
          $("#formaddmentor").show();
        }else{
          $("#formaddmentor").hide();
        }
      }
    </script>

  </body>
</html>
