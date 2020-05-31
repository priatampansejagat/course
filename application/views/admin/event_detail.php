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

    <style type="text/css">
      .deleteFile {
          padding: 3px 7px;
          color: #bf0000;
          font-weight: bold;
          cursor:pointer;
      }
      .meter {
          color:#fff;
          line-height:18px;
          font-size:12px;
      }
    </style>

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


            <div class="row-fluid" id="formaddevent">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Event Info</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess">
                      <button class="close" onclick="alertSuccessHide()"></button>
                      <p id="message"></p> </div>
                    <div class="alert alert-danger" id="alertFailed">
                      <button class="close" onclick="alertFailedHide()"></button>
                      <p id="message"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-6">
                            <h4>Basic Information</h4>
                            <div class="row form-row">
                              <div class="col-md-12">
                                <input name="title" id="title" type="text" class="form-control" placeholder="Title" value="<?php echo (isset($event['title']) ? $event['title'] : ''); ?>">
                              </div>
                            </div>
                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <textarea id="description" name="description" placeholder="Enter description ..." class="form-control" rows="5"><?php echo($event['description']); ?></textarea>
                              </div>
                             
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <h4> &nbsp; </h4>
                             
                            <div class="row form-row">
                              <div class="col-md-6">
                                <input type='text' placeholder="Start Date" class="form-control" id='start_date' name="start_date" value="<?php echo (isset($event['start_date']) ? $event['start_date'] : ''); ?>" />
                              </div>
                              <div class="col-md-6">
                                <input type='text' placeholder="End Date" class="form-control" id='end_date' name="end_date" value="<?php echo (isset($event['end_date']) ? $event['end_date'] : ''); ?>" />
                              </div>
                            </div>


                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <input name="price" id="price" type="text" class="form-control" placeholder="Price Rp..." value="<?php echo (isset($event['price']) ? $event['price'] : ''); ?>" >
                              </div>

                            </div>



                            <div class="row small-text">
                              <p class="col-md-12">
                              </p>
                            </div>
                          </div>
                        </div>
                        
                      <!-- </form> -->

                      <div class="form-actions">
                        <div class="pull-left">
                          
                        </div>
                        <div class="pull-right">
                          <button name="updateevent" id="updateevent" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                          <a onclick="location.reload()" class="btn btn-white btn-cons" type="button">Cancel</a>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>


            <div class="row-fluid" id="formaddcourse">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Upload Cover</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_cover">
                      <button class="close" onclick="alertSuccessHide_cover()"></button>
                      <p id="message_cover"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_cover">
                      <button class="close" onclick="alertFailedHide_cover()"></button>
                      <p id="message_cover"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-12">
                            <div class="row form-row">
                              
                              <div class="col-md-10">
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-white btn-cons" id="select_cover">Select File</button>
                                </div>
                                <div class="col-md-10">
                                  <div id="results_cover" class="panel"></div>
                                </div>  
                                
                              </div>
                              <div class="col-md-2">  
                                <div class="pull-right">
                                  <a id="upload_cover" onclick="cover_handler(this)" class="btn btn-primary" type="button"><i class="fa fa-cloud-upload"></i></a>
                                  <a id="print_cover"  class="btn btn-warning " type="button"><i class="fa fa-print"></i></a>
                                  <a id="delete_cover" onclick="cover_handler(this)" class="btn btn-danger " type="button"><i class="fa fa-trash-o"></i></a>
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


            <div class="row-fluid" id="formaddcourse">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Meeting Via Zoom</h4>
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
                              
                              <div id="zoom_enable">
                                <div class="row form-row">
                                  <div class="col-md-2">
                                    <a href="https://zoom.us/oauth/authorize?response_type=code&client_id=pewdqWT7SJSIc6oGfYAfOA&redirect_uri=http://temporaryapi.rumahpeneleh.or.id/zoomoauthtoken" target="_BLANK" class="btn btn-primary btn-cons" id="activate_zoom">Login to Zoom</a>
                                  </div>
                                </div>
                              </div>

                              <div id="zoom_setting">
                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <b>Topic : </b><input type='text' placeholder="" class="form-control" id='zoom_topic' name="zoom_topic" value="" />
                                  </div>
                                </div>
                                <div class="row form-row">
                                  <div class="col-md-4">
                                    <b>Start Date : </b><input type='text' placeholder="Start Date" class="form-control" id='zoom_start_date' name="zoom_start_date" />
                                  </div>
                                  <div class="col-md-1">
                                    <b>Hour : </b>
                                    <input type='text' placeholder="24" class="form-control " id='zoom_start_time_hour' name="zoom_start_time_hour" /> 
                                  </div>  

                                  <div class="col-md-1">  
                                    <b>Min : </b>
                                    <input type='text' placeholder="59" class="form-control" id='zoom_start_time_min' name="zoom_start_time_min" /> 
                                  </div> 

                                  <div class="col-md-1"> 
                                    <b>Sec : </b>  
                                    <input type='text' placeholder="59" class="form-control" id='zoom_start_time_sec' name="zoom_start_time_sec" />
                                  
                                  </div>
                                  <div class="col-md-2">
                                    <b>Duration : </b><input type='text' placeholder="Minutes" class="form-control" id='zoom_duration' name="zoom_duration" value="" />  
                                  </div>
                                </div>
                                <div class="row form-row">
                                  <div class="col-md-8">
                                    <b>Password : </b><input type='text' placeholder="" class="form-control" id='zoom_password' name="zoom_password" value="" />
                                  </div>
                                  
                                </div>

                                <div class="row form-row">
                                  <div class="col-md-12">
                                    <a href="" target="_BLANK" class="btn btn-block btn-success btn-cons" id="zoom_start_meeting">START MEETING</a>
                                  </div>
                                  
                                </div>

                              </div>
                             
                             
                            </div>
                          </div>
                        </div>
                        <div class="form-actions" id="zoom_control">
                          
                          <div class="pull-left">
                            
                          </div>
                          <div class="pull-right">
                            <button type="button" class="btn btn-danger btn-cons" id="delete_zoom">Reset</button>
                            <button type="button" class="btn btn-primary btn-cons" id="save_zoom">Save Settings</button>
                          </div>
                        </div>
                    </div>
                    

                  </div>
                </div>
              </div>
            </div>
            

            <div class="row-fluid" id="formaddevent">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Add Course to Event</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_addcourse">
                      <button class="close" onclick="alertSuccessHide_addcourse()"></button>
                      <p id="message_chapter"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_addcourse">
                      <button class="close" onclick="alertFailedHide_addcourse()"></button>
                      <p id="message_chapter"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-12">
                            <div class="row form-row">
                              <div class="col-md-12">

                                <!-- <span class="label-input100">Country</span> -->
                                <select class="form-contro" id="addcourse_select" name="addcourse_select" placeholder="Choose Course" type="text">
                                    <option value="" selected disabled>Select Course</option>

                                    <?php foreach ($course_list as $key => $value) { ?>
                                        <option value="<?php echo($value['id']); ?>"><?php echo($value['title']); ?></option>
                                    <?php } ?>
                                    
                                </select>
                                <!-- <span class="focus-input100"></span> -->

                                <div class="pull-right">
                                  <button name="add_course" id="add_course" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Add</button>
                                  <!-- <a onclick="clearchapter()" class="btn btn-white btn-cons" type="button">Clear</a> -->
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



            <div class="row-fluid" id="formaddevent">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Courses</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <!-- <div class="alert alert-info" id="alertSuccess_courselist">
                      <button class="close" onclick="alertSuccessHide_courselist()"></button>
                      <p id="message_courselist"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_courselist">
                      <button class="close" onclick="alertFailedHide_courselist()"></button>
                      <p id="message_courselist"></p> </div>  --> 
                    

                    <table class="table table-striped" id="example2">
                      <thead>
                        <tr>
                          <th style="width: 50px;">Num</th>
                          <th>Title</th>
                          <th>Mentor</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
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

    <script src="<?php echo base_url();?>assets/resumable/resumable.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

      //START OF INITIATING VARIABLE=============================================================

      //variable global
      var event_id       = "<?php echo($event['id']); ?>";

      var select_cover = $("#select_cover");
      var results_cover = $("#results_cover");
      var resumable_cover = new Resumable({
            target: noncurl_api_url + add_cover_event_url,
            maxChunkRetries: 5,
            query: {
                event_id: event_id,
            },
            maxFiles: 3,
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });
      resumable_cover.assignBrowse(select_cover);

      //END OF INITIATING VARIABLE=============================================================

      $("#alertFailed").hide();
      $("#alertSuccess").hide();
      function alertSuccess() {
        if ($("#alertSuccess").is(":hidden")) {
          $("#alertSuccess").show();
        }
      }
      function alertSuccessHide(){
        $("#alertSuccess").hide();
      }
      
      function alertFailed() {
        if ($("#alertFailed").is(":hidden")) {
          $("#alertFailed").show();
        }
      }

      function alertFailedHide(){
        $("#alertFailed").hide();
      }

      $("#alertFailed_cover").hide();
      $("#alertSuccess_cover").hide();
      function alertSuccess_cover() {
        if ($("#alertSuccess_cover").is(":hidden")) {
          $("#alertSuccess_cover").show();
        }
      }
      function alertSuccessHide_cover(){
        $("#alertSuccess_cover").hide();
      }
      
      function alertFailed_cover() {
        if ($("#alertFailed_cover").is(":hidden")) {
          $("#alertFailed_cover").show();
        }
      }

      function alertFailedHide_cover(){
        $("#alertFailed_cover").hide();
      }

      $("#alertFailed_addcourse").hide();
      $("#alertSuccess_addcourse").hide();
      function alertSuccess_addcourse() {
        if ($("#alertSuccess_addcourse").is(":hidden")) {
          $("#alertSuccess_addcourse").show();
        }
      }
      function alertSuccessHide_addcourse(){
        $("#alertSuccess_addcourse").hide();
      }
      
      function alertFailed_addcourse() {
        if ($("#alertFailed_addcourse").is(":hidden")) {
          $("#alertFailed_addcourse").show();
        }
      }

      function alertFailedHide_addcourse(){
        $("#alertFailed_addcourse").hide();
      }

      $('#start_date').datepicker({
          format: 'yyyy-mm-dd',
      });
      $('#end_date').datepicker({
          format: 'yyyy-mm-dd',
      });
      $('#start_date').change(function() {
                var dob = $('#start_date').val();
                if (dob != '') {
                    dob = new Date(dob);
                    var today = new Date();
                    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                }
            });
      $('#end_date').change(function() {
                var dob = $('#end_date').val();
                if (dob != '') {
                    dob = new Date(dob);
                    var today = new Date();
                    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                }
            });


      $('#zoom_start_date').datepicker({
          format: 'yyyy-mm-dd',
      });
      $('#zoom_start_date').change(function() {
                var dob = $('#zoom_start_date').val();
                if (dob != '') {
                    dob = new Date(dob);
                    var today = new Date();
                    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                }
            });

      // $("#zoom_control").hide();
      // $("#zoom_setting").hide();


      $("#updateevent").click(function(){
        var title = $('#title').val();
        var description = $('#description').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var price = $('#price').val();

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                    "id": event_id,
                    "title": title,
                    "description": description,
                    "start_date": start_date,
                    "end_date": end_date,
                    "price": price
                  },
                  url: update_event_url
              },
            success: function(respons){
              // alert(respons);
              var jsonArr = JSON.parse(respons);
              alert('Success');
              location.reload();

          }});
      });


      // datatable
      function dataTable_refresh(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: {  "ihateapple" : event_single_dic,
                            "event_id" : event_id
                          },
                  url: get_datatable_url
              },
            success: function(respons){
              // console.log(respons);
              var jsonArr = JSON.parse(respons);

              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data']['course_list'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);
                // alert(jsonArr['data']['course_list'][i]['mentor_detail']['fullname']);
                var mentor = "<i style='color:red'>none</i>";

                if (jsonArr['data']['course_list'][i]['mentor_detail']['fullname'] != null && jsonArr['data']['course_list'][i]['mentor_detail']['fullname'] != "") {
                  mentor = "<b>"+jsonArr['data']['course_list'][i]['mentor_detail']['fullname']+"</b>";
                }

                var data = [
                          '',
                          i+1,
                          jsonArr['data']['course_list'][i]['title'],
                          mentor,
                          '<a onclick="delbridge(this)" class="btn btn-danger" id="'+jsonArr['data']['course_list'][i]['id']+'" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> '  +
                          '<a class="btn btn-white" href="<?php echo(base_url()); ?>course/' + jsonArr['data']['course_list'][i]['id'] + '/assignment" data-toggle="tooltip" title="Assignments" ><i class="fa fa-folder-open"></i></a>'

                ];
                $("#example2").DataTable().fnAddData(data); 

              } 

          }});
      }
      dataTable_refresh();


      $("#add_course").click(function(){
        var course_id = $("#addcourse_select").val();

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: {  "course_id" : course_id,
                            "event_id" : event_id
                          },
                  url: add_course_event_url
              },
            success: function(respons){
              
              dataTable_refresh();
              alert("Success");

          }});

      });


      resumable_cover.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile_cover" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_cover.append(template);

      });

      $(document).on('click', '.deleteFile_cover', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_cover.getFromUniqueIdentifier(identifier);

        resumable_cover.removeFile(file);
        parent.remove();
      });

      function get_cover(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": event_single_dic,
                    "event_id": event_id
                },
                url: get_datatable_url
            },
            success: function(respons) {
              var jsonArr = JSON.parse(respons);
              $("#print_cover").attr("href", jsonArr['data']['event_info']['cover_link']);  
            }
        });
      } 
      get_cover();

      // ngapain juga sih gw bikin ni func??? heran gw
      function cover_handler(obj){
        if (obj.id == 'upload_cover') {
          upload_cover(resumable_cover,results_cover);
        }else if (obj.id == 'delete_cover') {
          delete_cover();
        }
      }

      function upload_cover(resumableObj, resultsObj) {
          
          if (resultsObj.children().length > 0) {
            // alert(resumableObj.query());
              resumableObj.upload();
          } else {
              // nothingToUpload.show();
          }

          resumableObj.on('fileProgress', function (file) {
              
          });

          resumableObj.on('fileSuccess', function (file, message) {
              
          });

          resumableObj.on('uploadStart', function () {
              
          });

          resumableObj.on('complete', function () {
              $('#message_cover').text('Upload Complete');
              alertSuccess_cover();
              $('.deleteFile_cover').click();
              get_cover();
          });

          resumableObj.on('fileError', function(file, message){
            $('#message_cover').text('Upload Failed');
            alertFailed_cover();
            $('.deleteFile_cover').click();
          });

      }

      function delete_cover(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "event_id": event_id
                },
                url: delete_cover_event_url
            },
            success: function(respons) {
              alert('Success');
              get_cover();  
            }
        });
      }

      function delbridge(obj){
        var course_id = obj.id;

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "event_id": event_id,
                    "course_id": course_id
                },
                url: delete_bridge_event_course_url
            },
            success: function(respons) {
              dataTable_refresh();
              alert('Success');
              
            }
        });
      }


      function get_zoom(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple" : get_zoom_event_alldata,
                    "event_id": event_id
                },
                url: get_datatable_url
            },
            success: function(respons) {
              console.log(respons);
              var jsonArr = JSON.parse(respons);

              if (jsonArr['data'] == null) {
                $("#zoom_topic").val('');
                $("#zoom_start_date").val('');
                $("#zoom_start_time_hour").val('');
                $("#zoom_start_time_min").val('');
                $("#zoom_start_time_sec").val('');
                $("#zoom_duration").val('');
                $("#zoom_password").val('');
                $("#zoom_start_meeting").attr("href", '#');

              }else{
                var zoomdate = jsonArr['data']['start_time'].split('T');
                var zoomtime = zoomdate[1].split(':');

                $("#zoom_topic").val(jsonArr['data']['topic']);
                $("#zoom_start_date").val(zoomdate[0]);
                $("#zoom_start_time_hour").val(zoomtime[0]);
                $("#zoom_start_time_min").val(zoomtime[1]);
                $("#zoom_start_time_sec").val(zoomtime[2]);
                $("#zoom_duration").val(jsonArr['data']['duration']);
                $("#zoom_password").val(jsonArr['data']['password']);
                $("#zoom_start_meeting").attr("href", jsonArr['data']['start_url']);
              }
              
              
            }
        });
      } get_zoom();

      $("#save_zoom").click(function(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                  'event_id'  : event_id,
                  'topic'     : $("#zoom_topic").val(),
                  'start_time': $("#zoom_start_date").val()+ "T" + 
                                    $("#zoom_start_time_hour").val()+":"+
                                    $("#zoom_start_time_min").val()+":"+
                                    $("#zoom_start_time_sec").val(),
                  'duration'  : $("#zoom_duration").val(),  
                  'password'  : $("#zoom_password").val()                
                },
                url: zoom_create_url
            },
            success: function(respons) {
              console.log(respons);
              alert('Success');
              
            }
        });
      });


      $("#delete_zoom").click(function(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "event_id": event_id
                },
                url: zoom_delete_url
            },
            success: function(respons) {
              console.log(respons);
              get_zoom();

            }
        });
      });

    </script>

  </body>
</html>
