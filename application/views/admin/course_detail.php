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


            <div class="row-fluid" id="formaddcourse">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Course Info</h4>
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
                                <input name="title" id="title" type="text" class="form-control" placeholder="Title" value="<?php echo (isset($course['info']['title']) ? $course['info']['title'] : ''); ?>">
                              </div>
                            </div>
                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <textarea id="description" name="description" placeholder="Enter description ..." class="form-control" rows="5"><?php echo($course['info']['description']); ?></textarea>
                              </div>
                             
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <h4> &nbsp; </h4>
                             
                            <div class="row form-row">
                              <div class="col-md-6">
                                <input type='text' placeholder="Start Date" class="form-control" id='start_date' name="start_date" value="<?php echo (isset($course['info']['start_date']) ? $course['info']['start_date'] : ''); ?>" />
                              </div>
                              <div class="col-md-6">
                                <input type='text' placeholder="End Date" class="form-control" id='end_date' name="end_date" value="<?php echo (isset($course['info']['end_date']) ? $course['info']['end_date'] : ''); ?>" />
                              </div>
                            </div>

                            <div class="row form-row">
                              <div class="col-md-12">

                                <!-- <span class="label-input100">Country</span> -->
                                <select class="form-contro" id="mentor_id" name="mentor_id" placeholder="Choose Course Mentor" type="text">

                                    <?php if (isset($course['info']['mentor'])) { ?>

                                        <option value="<?php echo($course['info']['mentor']['id']) ?>" selected disabled><?php echo($course['info']['mentor']['fullname']) ?></option>

                                    <?php }else { ?>

                                        <option value="" selected disabled>Select Mentor</option>

                                    <?php } ?>
                                    


                                     <?php foreach ($mentor_list as $key => $value) { ?>
                                        <option value="<?php echo($value['id']); ?>"><?php echo($value['fullname']); ?></option>
                                    <?php } ?> 
                                    
                                </select>
                                <!-- <span class="focus-input100"></span> -->

                              </div>
                              
                            </div>

                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <input name="price" id="price" type="text" class="form-control" placeholder="Price Rp..." value="<?php echo (isset($course['info']['price']) ? $course['info']['price'] : ''); ?>" >
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
                          <button name="updatecourse" id="updatecourse" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                          <a onclick="location.reload()" class="btn btn-white btn-cons" type="button">Cancel</a>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            
            <div class="row-fluid" id="formadd_cert">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>Upload Certificate</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_certificate">
                      <button class="close" onclick="alertSuccessHide_certificate()"></button>
                      <p id="message_certificate"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_certificate">
                      <button class="close" onclick="alertFailedHide_certificate()"></button>
                      <p id="message_certificate"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-12">
                            <div class="row form-row">
                              
                              <div class="col-md-10">
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-white btn-cons" id="select_cert">Select File</button>
                                </div>
                                <div class="col-md-10">
                                  <div id="results_cert" class="panel"></div>
                                </div>  
                                
                              </div>
                              <div class="col-md-2">  
                                <div class="pull-right">
                                  <a id="upload_cert" onclick="cert_handler(this)" class="btn btn-primary" type="button"><i class="fa fa-cloud-upload"></i></a>
                                  <a id="print_cert"  class="btn btn-warning " type="button"><i class="fa fa-print"></i></a>
                                  <a id="delete_cert" onclick="cert_handler(this)" class="btn btn-danger " type="button"><i class="fa fa-trash-o"></i></a>
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
                    <h4>Add Course Chapter</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_chapter">
                      <button class="close" onclick="alertSuccessHide_chapter()"></button>
                      <p id="message_chapter"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_chapter">
                      <button class="close" onclick="alertFailedHide_chapter()"></button>
                      <p id="message_chapter"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-6">
                            <h4>Add Chapter</h4>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <input name="chapter_sequence" id="chapter_sequence" type="number" class="form-control" placeholder="Chp. Number" >
                              </div>
                              <div class="col-md-8">
                                <input name="chapter_title" id="chapter_title" type="text" class="form-control" placeholder="Chapter Title" >
                              </div>
                            </div>
                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <textarea id="chapter_description" name="chapter_description" placeholder="Enter description ..." class="form-control" rows="5"></textarea>
                              </div>
                             
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                             
                            <div class="row form-row">
                              <div class="col-md-4">
                                <!-- <input type='file' accept=".mp4" id='chapter_video' name="chapter_video" /> -->
                                
                                
                              </div>
                              <div class="col-md-8">
                                
                              </div>  
                             
                            </div>

                            <div class="row form-row">
                              <div class="col-md-12">
                                
                              </div>  
                                
                            </div>  

                          </div>
                        </div>
                        
                      <!-- </form> -->

                      <div class="form-actions">
                        <div class="pull-left">
                          
                        </div>
                        <div class="pull-right">
                          <button name="save_chapter" id="save_chapter" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                          <a onclick="clearchapter()" class="btn btn-white btn-cons" type="button">Clear</a>
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
                    <h4>Chapters</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_video">
                      <button class="close" onclick="alertSuccessHide_video()"></button>
                      <p id="message_video"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_video">
                      <button class="close" onclick="alertFailedHide_video()"></button>
                      <p id="message_video"></p> </div>  
                    

                    <table class="table table-striped" id="example2">
                      <thead>
                        <tr>
                          <th style="width: 50px;">Seq.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Video</th>
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

    <script type="text/javascript">

      //START OF INITIATING VARIABLE=============================================================

      //variable global
      var course_id       = "<?php echo($course['info']['id']); ?>";
      var arrChapter      = [];
      var resumableButton = [];
      var uploadButton = [];
      var resumable       = [];
      var results         = [];

      var select_cert = $("#select_cert");
      var results_cert = $("#results_cert");
      var resumable_cert = new Resumable({
            target: noncurl_api_url + upload_certificate_url,
            maxChunkRetries: 5,
            query: {
                course_id: course_id,
            },
            maxFiles: 3,
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });
      resumable_cert.assignBrowse(select_cert);

      //END OF INITIATING VARIABLE=============================================================
      $("#formadd_cert").hide();
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

      $("#alertFailed_certificate").hide();
      $("#alertSuccess_certificate").hide();
      function alertSuccess_certificate() {
        if ($("#alertSuccess_certificate").is(":hidden")) {
          $("#alertSuccess_certificate").show();
        }
      }
      function alertSuccessHide_certificate(){
        $("#alertSuccess_certificate").hide();
      }
      
      function alertFailed_certificate() {
        if ($("#alertFailed_certificate").is(":hidden")) {
          $("#alertFailed_certificate").show();
        }
      }

      function alertFailedHide_certificate(){
        $("#alertFailed_certificate").hide();
      }

      $("#alertFailed_chapter").hide();
      $("#alertSuccess_chapter").hide();
      function alertSuccess_chapter() {
        if ($("#alertSuccess_chapter").is(":hidden")) {
          $("#alertSuccess_chapter").show();
        }
      }
      function alertSuccessHide_chapter(){
        $("#alertSuccess_chapter").hide();
      }
      
      function alertFailed_chapter() {
        if ($("#alertFailed_chapter").is(":hidden")) {
          $("#alertFailed_chapter").show();
        }
      }

      function alertFailedHide_video(){
        $("#alertFailed_video").hide();
      }

      $("#alertFailed_video").hide();
      $("#alertSuccess_video").hide();
      function alertSuccess_video() {
        if ($("#alertSuccess_video").is(":hidden")) {
          $("#alertSuccess_video").show();
        }
      }
      function alertSuccessHide_video(){
        $("#alertSuccess_video").hide();
      }
      
      function alertFailed_video() {
        if ($("#alertFailed_video").is(":hidden")) {
          $("#alertFailed_video").show();
        }
      }

      function alertFailedHide_video(){
        $("#alertFailed_video").hide();
      }




      $("#updatecourse").click(function(){
        var title = $('#title').val();
        var description = $('#description').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var mentor_id = $('#mentor_id').val();
        var price = $('#price').val();
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { 
                    "id": course_id,
                    "title": title,
                    "description": description,
                    "start_date": start_date,
                    "end_date": end_date,
                    "mentor_id": mentor_id,
                    "price": price
                  },
                  url: update_course_url
              },
            success: function(respons){
              // alert(respons);
              var jsonArr = JSON.parse(respons);
              alert('Success');
              location.reload();

          }});
      });

      // 
      // datatable
      function dataTable_refresh(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { "ihateapple": course_chapter_dic, "course_id": course_id },
                  url: get_datatable_url
              },
            success: function(respons){
              // alert(respons);
              var jsonArr = JSON.parse(respons);
              arrChapter = jsonArr;
              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);
                var chapter_id = jsonArr['data'][i]['id'];

                var data = [
                          '',
                          jsonArr['data'][i]['sequence'],
                          jsonArr['data'][i]['tittle'],
                          jsonArr['data'][i]['description'],
                          '<button class="btn btn-warning btn-xs btn-mini" id="chapter_video_select_'+ chapter_id +'" name="chapter_video_select_'+ chapter_id +'">Add Video</button> '+
                          '<button class="btn btn-danger btn-xs btn-mini" id="chapter_video_upload_'+ chapter_id +'" name="chapter_video_upload_'+ chapter_id +'">upload Video</button> '+
                          '<div id="results_'+ chapter_id +'" class="panel"></div>',

                          '<a onclick="delchapter(this)" class="btn btn-danger" id="'+ chapter_id +'" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> ' 

                ];

                if (jsonArr['data'][i]['video_link'] != "#") {
                  var vid_link = jsonArr['data'][i]['video_link'];
                  data = [
                          '',
                          jsonArr['data'][i]['sequence'],
                          jsonArr['data'][i]['tittle'],
                          jsonArr['data'][i]['description'],
                          '<a href="'+ vid_link +'" class="btn btn-success btn-xs btn-mini" id="chapter_video_view_'+ chapter_id +'" name="chapter_video_view_'+ chapter_id +'">Watch</a> '+
                          '<button class="btn btn-warning btn-xs btn-mini" id="chapter_video_select_'+ chapter_id +'" name="chapter_video_select_'+ chapter_id +'">Add Video</button> '+
                          '<button class="btn btn-danger btn-xs btn-mini" id="chapter_video_upload_'+ chapter_id +'" name="chapter_video_upload_'+ chapter_id +'">upload Video</button> '+
                          '<div id="results_'+ chapter_id +'" class="panel"></div>',

                          '<a onclick="delchapter(this)" class="btn btn-danger" id="'+ chapter_id +'" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> ' 

                        ];
                }

                $("#example2").DataTable().fnAddData(data); 

                // initiate resumable =================================================
                initiateResumable(chapter_id);

              } 

          }});
      }
      dataTable_refresh();


      function initiateResumable(chapter_id){

        uploadButton[chapter_id] = $("#chapter_video_upload_"+ chapter_id );
        uploadButton[chapter_id].hide();
        uploadButton[chapter_id].click(function(){
          uploadVideo(chapter_id);          
        });

        resumableButton [ chapter_id ]   = $("#chapter_video_select_"+ chapter_id );
        results [ chapter_id ]     = $("#results_"+ chapter_id);

        resumable [ chapter_id ] = new Resumable({
            target: noncurl_api_url + create_chapter_url_vid,
            maxChunkRetries: 5,
            query:{
                    chapter_id: chapter_id,
                    course_id: course_id
            },
            maxFiles: 3,
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

        resumable [ chapter_id ].assignBrowse(resumableButton [ chapter_id ]);


        resumable[chapter_id].on('fileAdded', function (file, event) {

          uploadButton[chapter_id].show();

                var template =
                    '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
                    '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
                    '<div style="color:red;" class="large-6 right deleteFile_'+chapter_id+'" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>'+
                    '<div class="progress large-6">' +
                    '<span class="meter" style="width:0%;"></span>' +
                    '</div>' +
                    '</div>';

                results[ chapter_id ].append(template);
          });

        $(document).on('click', '.deleteFile_'+chapter_id, function () {
              var self = $(this),
                  parent = self.parent(),
                  identifier = parent.data('uniqueid'),
                  file = resumable[chapter_id].getFromUniqueIdentifier(identifier);

              resumable[chapter_id].removeFile(file);
              parent.remove();
              uploadButton[chapter_id].hide();
          });
      }




      // onPage Execution


      $("#save_chapter").click(function(){

          var  chapt_sequence        = $("#chapter_sequence").val();
          var  chapt_title           = $("#chapter_title").val();
          var  chapt_description     = $("#chapter_description").val();

        // console.log(base_url + post_url);
        $.ajax({
          type: 'POST',
          // dataType: "jsonp",
          url: base_url + post_url,
          data: {
                param: {
                    "course_id": course_id,
                    "sequence": chapt_sequence,
                    "title": chapt_title,
                    "description": chapt_description
                },
                url: create_chapter_url
            },
          
          success: function(respons){
            console.log(respons);
            var jsonArr = JSON.parse(respons);
            $('#message_chapter').text(jsonArr['message']);
            if (jsonArr['proc'] == 'true') {
              // uploadVideo(jsonArr['data']['id']);
              dataTable_refresh();
              alertSuccess_chapter();
            }else{
              alertFailed_chapter();
            }
            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
              // alert("Status: " + textStatus); 
              alert("Error: " + errorThrown); 
          } 
        });
      });




      function uploadVideo (chapter_id) {
          
          if (results[chapter_id].children().length > 0) {
              resumable[chapter_id].upload();
          } else {
              // nothingToUpload.show();
          }

          resumable[chapter_id].on('fileProgress', function (file) {
              var progress = Math.floor(file.progress() * 100);
              // $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.meter').css('width', progress + '%');
              $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.meter').html('&nbsp;' + progress + '%');
          });

          resumable[chapter_id].on('fileSuccess', function (file, message) {
              $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.progress').addClass('success');
          });


          resumable[chapter_id].on('uploadStart', function () {
              // $('.alert-box').text('Uploading....');
          });

          resumable[chapter_id].on('complete', function () {
              $('#message_video').text('Upload Complete');
              alertSuccess_video();
              $('.deleteFile_'+chapter_id).click();
          });

          resumable[chapter_id].on('fileError', function(file, message){
            $('#message_video').text('Upload Failed');
            alertFailed_video();
            $('.deleteFile_'+chapter_id).click();
          });

      }


      resumable_cert.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile_cert" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_cert.append(template);

      });

       $(document).on('click', '.deleteFile_cert', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_cert.getFromUniqueIdentifier(identifier);

        resumable_cert.removeFile(file);
        parent.remove();
      });

      function get_cert(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": course_single_dic,
                    "id": course_id
                },
                url: get_datatable_url
            },
            success: function(respons) {
              var jsonArr = JSON.parse(respons);
              $("#print_cert").attr("href", jsonArr['data']['certificate']);  
            }
        });
      } 
      get_cert();

      // ngapain juga sih gw bikin ni func??? heran gw
      function cert_handler(obj){
        if (obj.id == 'upload_cert') {
          upload_cert(resumable_cert,results_cert);
        }else if (obj.id == 'delete_cert') {
          delete_cert();
        }
      }

      function upload_cert(resumableObj, resultsObj) {
          
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
              $('#message_certificate').text('Upload Complete');
              alertSuccess_certificate();
              $('.deleteFile_cert').click();
              get_cert();
          });

          resumableObj.on('fileError', function(file, message){
            $('#message_certificate').text('Upload Failed');
            alertFailed_certificate();
            $('.deleteFile_cert').click();
          });

      }

      function delete_cert(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "course_id": course_id
                },
                url: delete_certificate_url
            },
            success: function(respons) {
              alert('Success');
              get_cert();  
            }
        });
      }

      function delchapter(obj){
         $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "chapter_id": obj.id
                },
                url: delete_chapter_url
            },
            success: function(respons) {
              alert('Success');
              dataTable_refresh();  
            }
        });
      }


    </script>

  </body>
</html>
