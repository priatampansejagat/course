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


              <div class="row-fluid" id="formaddcourse">
                <div class="span12">
                  <div class="grid simple ">
                    <div class="grid-title">
                      <h4>Change Password</h4>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                      </div>

                    </div>
                    <div class="grid-body ">
                      
                      <div class="grid-body no-border">
                        <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                          <div class="row column-seperation">
                            <div class="col-md-12">
                              <div class="row form-row">
                                
                                <div class="col-md-10">
                                  <div class="col-md-6">
                                    <input name="new_password" id="new_password" type="password" class="form-control" placeholder="New Password">
                                  </div>
                                  <div class="col-md-6">
                                    <input name="new_password_again" id="new_password_again" type="password" class="form-control" placeholder="Repeat New Password">
                                  </div>  
                                  
                                </div>
                                <div class="col-md-2">  
                                  <div class="pull-right">
                                    <a id="update_pass" class="btn btn-danger " type="button"><i class="fa fa-save"></i></a>
                                  </div>
                                </div>
                               
                              </div>
                            </div>
                          </div>
                      </div>
                      


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
      
      var user_id = "<?php echo($user['id']); ?>";

      $("#update_pass").click(function(){
        var newpass = $("#new_password").val();
        var repeat = $("#new_password_again").val();

        if(newpass != repeat){
          alert("New password incorrect");
        }else{
          $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: {
                      "user_id": user_id,
                      "action": 'update_password',
                      "data_update": newpass
                  },
                  url: update_profile_textbased_url
              },
            
            success: function(respons){
             
              alert('Success');
              
          }});
        }
      });

    </script>
  </body>
</html>
