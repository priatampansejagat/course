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


    <!-- GC -->
    <script src="<?= base_url(); ?>assets/global-constant.js"></script>
    <!-- end GC -->

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

            <div class="row-fluid">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Participant</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>
                  </div>
                  <div class="grid-body ">
                    <table class="table table-striped" id="example2">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <button class="btn btn-primary" style="margin-left:12px" id="test2"></button>
            <div class="admin-bar" id="quick-access" style="display:">
              <div class="admin-bar-inner">
                <div class="form-horizontal">
                  <h4 class="">Do you want to confirm <span id="confirmInfo"></span></h4>
                  <p id="selectedUser" hidden></p>
                </div>
                <button onclick="confirmClick(this)" class="btn btn-danger btn-cons btn-add" type="button" id="confirmClick" >Confirm</button>
                <button class="btn btn-white btn-cons btn-cancel" type="button" id="cancelConfirm">Cancel</button>
              </div>
            </div>

          </div>
        </div>
        <!-- END PAGE CONTAINER -->
      </div>



    <!-- jshandler -->
    <?php $this->load->view('admin/layouts/jshandler');  ?>

    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>


    <script type="text/javascript">

      $("#test2").hide();


      // datatable
      function dataTable_refresh(){
        var condition = {
                          'course_id':"<?php echo $course['info']['id']; ?>"
        };

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "ihateapple": course_member, 
                          "condition": condition
                        },
                  url: get_datatable_url
              },
            success: function(respons){
              // alert(respons);
              var jsonArr = JSON.parse(respons);

              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);
                var style='';

                if (jsonArr['data'][i]['confirmed'] == 'confirmed') {
                  style="color:blue";
                }else{
                  style="color:red";
                }
                var data = [
                          '',
                          jsonArr['data'][i]['detail']['id'],
                          jsonArr['data'][i]['detail']['fullname'],
                          '<div style="'+style+'">'+jsonArr['data'][i]['confirmed']+'</div>',
                          '<a onclick="confirm(this)" class="btn btn-danger" id="'+jsonArr['data'][i]['id']+'"  name="'+jsonArr['data'][i]['detail']['fullname']+'"data-toggle="tooltip" title="Confirm" ><i class="fa fa-check"></i></a> ' +
                          '<a class="btn btn-primary" href="<?php echo base_url(); ?>users/'+jsonArr['data'][i]['detail']['id']+'" data-toggle="tooltip" title="Detail" ><i class="fa fa-arrow-right"></i></a> '

                ];

                $("#example2").DataTable().fnAddData(data); 

              } 

          }});
      }
      dataTable_refresh();



      function confirm(obj){
        $("#selectedUser").text(obj.id);
        $("#confirmInfo").text(obj.name);
        $("#test2").click();
      }

      function confirmClick(obj){
        // alert( $("#selectedUser").text());
        var course_member_id = $("#selectedUser").text();
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "course_member_id": course_member_id
                        },
                  url: confirm_register_user
              },
            success: function(respons){
              dataTable_refresh();
              $("#cancelConfirm").click();
          }});

      }

    </script>

  </body>
</html>
