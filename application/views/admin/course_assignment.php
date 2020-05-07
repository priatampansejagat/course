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
                    <h4>BASIC</h4>
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
                          <th>Type</th>
                          <th>Assignment</th>
                          <th>Certificate</th>
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

      var course_id = "<?php echo($course['info']['id']) ?>";
      
      // datatable
      function dataTable_refresh(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "ihateapple": assignment_all, 
                          "course_id": course_id,

                        },
                  url: get_datatable_url
              },
            success: function(respons){
              var jsonArr = JSON.parse(respons);
              // console.log(respons);

              $("#example2").DataTable().fnClearTable();

              // BASIC
              for (var i = 0; i < jsonArr['data']['registered_user']['basic'].length ; i++) {
                var assignment_link = '#';
                var user_id = jsonArr['data']['registered_user']['basic'][i]['id'];
                var event_id = null;
                var cert_enable = "cert_enable('"+ user_id +"', "+ event_id +")";
                var cert_disable = "cert_disable('"+ user_id +"', "+ event_id +")";


                if (jsonArr['data']['registered_user']['basic'][i] ['assignment'] != null) {
                  assignment_link = jsonArr['data']['registered_user']['basic'][i]['assignment']['assignment'];
                }
                var data = [
                          '',
                          jsonArr['data']['registered_user']['basic'][i]['id'],
                          jsonArr['data']['registered_user']['basic'][i]['fullname'],
                          'Single Course',
                          '<a class="btn btn-white" onclick="assignment_download(this)" name="'+assignment_link+'" data-toggle="tooltip" title="Assignment" ><i class="fa fa-download"></i></a> ',

                          '<p id="certcourse_stat_'+ jsonArr['data']['registered_user']['basic'][i]['id'] +'"></p>',

                          '<a onclick="'+cert_enable+'" class="btn btn-primary btn-xs btn-mini" data-toggle="tooltip">enable certificate</a> '+
                          '<a onclick="'+cert_disable+'" class="btn btn-danger btn-xs btn-mini" data-toggle="tooltip">disable certificate</a> '

                ];

                $("#example2").DataTable().fnAddData(data); 
                certcourse_status_update(jsonArr['data']['registered_user']['basic'][i]['id']);
              } 

              // EVENT
              for(var i = 0; i<jsonArr['data']['registered_user']['event'].length; i++ ){

                var loop_event = jsonArr['data']['registered_user']['event'];

                for(j = 0; j<loop_event[i]['user'].length; j++){
                  var loop_user = loop_event[i]['user'];

                  var assignment_link = '#';
                  var user_id = loop_user[j]['id'];
                  var event_id = loop_event[i]['info']['id'];

                  var cert_enable = "cert_enable('"+ user_id +"', '"+ event_id +"')";
                  var cert_disable = "cert_disable('"+ user_id +"', '"+ event_id +"')";

                  if (loop_user[j] ['assignment'] != null) {
                    assignment_link = loop_user[j]['assignment']['assignment'];
                  }

                  var data = [
                            '',
                            loop_user[j]['id'],
                            loop_user[j]['fullname'],
                            'Event : '+loop_event[i]['info']['title'],
                            '<a class="btn btn-white" onclick="assignment_download(this)" name="'+assignment_link+'" data-toggle="tooltip" title="Assignment" ><i class="fa fa-download"></i></a> ',

                            '<p id="certevent_stat_'+ loop_user[j]['id'] +'"></p>',

                            '<a onclick="'+cert_enable+'" class="btn btn-primary btn-xs btn-mini" data-toggle="tooltip">enable certificate</a> '+
                            '<a onclick="'+cert_disable+'" class="btn btn-danger btn-xs btn-mini" data-toggle="tooltip">disable certificate</a> '

                  ];

                  $("#example2").DataTable().fnAddData(data); 
                  certevent_status_update(loop_user[j]['id'], loop_event[i]['info']['id']);

                }


              }

          }});
      }
      dataTable_refresh();

      function assignment_download(obj){
        if (obj.name == '#') {
          alert('No assignment uploaded');
        }else{
          window.open(obj.name, '_blank');
        }
      }

      function cert_enable(user_id, event_id){

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "user_id": user_id,
                          "course_id": course_id,
                          "event_id": event_id
                        },
                  url: cert_enable_url
              },
            success: function(respons){
              // console.log('respons = '+respons);
              var jsonArr = JSON.parse(respons);
              
              if (jsonArr['message'] == 'Success') {
                alert('Success');
              }else{
                alert('Failed');
              }              
          }});

        if (event_id == null) {
          certcourse_status_update(user_id);
        }else{
          certevent_status_update(user_id, event_id);
        }
      }

      function cert_disable(user_id, event_id){

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "user_id": user_id,
                          "course_id": course_id,
                          "event_id": event_id
                        },
                  url: cert_disable_url
              },
            success: function(respons){
              // console.log('respons = '+respons);
              var jsonArr = JSON.parse(respons);
              
              if (jsonArr['message'] == 'Success') {
                alert('Success');
              }else{
                alert('Failed');
              }              
          }});
           
        if (event_id == null) {
          certcourse_status_update(user_id);
        }else{
          certevent_status_update(user_id, event_id);
        }
      }

      function certcourse_status_update(user_id){
        // alert(user_id);
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "ihateapple": cert_status_dic, 
                          "user_id": user_id,
                          "course_id": course_id,
                          "event_id": null
                        },
                  url: get_datatable_url
              },
            success: function(respons){
              // console.log('respons = '+respons);
              var jsonArr = JSON.parse(respons);
              
              if (jsonArr['data'] == null) {
                var cert_stat = $("#certcourse_stat_"+user_id);
                cert_stat.text('Disabled');
                cert_stat.css("color","red");
              }else{
                if (jsonArr['data']['status'] == 1) {
                  var cert_stat = $("#certcourse_stat_"+user_id);
                  cert_stat.text('Enabled');
                  cert_stat.css("color","green");
                }else{
                  var cert_stat = $("#certcourse_stat_"+user_id);
                  cert_stat.text('Disabled');
                  cert_stat.css("color","red");
                }
              }
          }});
      }

      function certevent_status_update(user_id, event_id){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                          "ihateapple": cert_status_dic, 
                          "user_id": user_id,
                          "course_id": course_id,
                          "event_id": event_id
                        },
                  url: get_datatable_url
              },
            success: function(respons){
              // console.log('respons = '+respons);
              var jsonArr = JSON.parse(respons);
              
              if (jsonArr['data'] == null) {
                var cert_stat = $("#certevent_stat_"+user_id);
                cert_stat.text('Disabled');
                cert_stat.css("color","red");
              }else{
                if (jsonArr['data']['status'] == 1) {
                  var cert_stat = $("#certevent_stat_"+user_id);
                  cert_stat.text('Enabled');
                  cert_stat.css("color","green");
                }else{
                  var cert_stat = $("#certevent_stat_"+user_id);
                  cert_stat.text('Disabled');
                  cert_stat.css("color","red");
                }
              }
          }});
      }

    

      


    </script>

  </body>
</html>
