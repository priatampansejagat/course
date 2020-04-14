<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('admin/layouts/header');

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
                                This form is used to add a mentor. Mentors that have been added can be deleted in the table.
                              </p>
                            </div>
                          </div>
                        </div>
                        
                      <!-- </form> -->

                      <div class="form-actions">
                        <div class="pull-left">
                          
                        </div>
                        <div class="pull-right">
                          <button name="savecourse" id="savecourse" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                          <a onclick="addcourse()" class="btn btn-white btn-cons" type="button">Cancel</a>
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
                    <h4>Course Chapter</h4>
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
                            <h4> Upload File (MP4) </h4>
                             
                            <div class="row form-row">
                              <div class="col-md-4">
                                <!-- <input type='file' accept=".mp4" id='chapter_video' name="chapter_video" /> -->
                                <button class="btn btn-warning btn-cons" id='chapter_video' name="chapter_video">Add File</button> 
                                
                              </div>
                              <div class="col-md-8">
                                <div id="results" class="panel"></div>
                              </div>  
                             
                            </div>

                            <div class="row form-row">
                              <div class="col-md-12">
                                <div class="alert-box alert" id="nothingToUpload" data-nothingToUpload>Nothing To Upload, Please Add The Video</div>
                                <div class="alert-box secondary"></div>
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



          </div>
        </div>
        <!-- END PAGE CONTAINER -->
      </div>



    <!-- jshandler -->
    <?php $this->load->view('admin/layouts/jshandler');  ?>

    <script src="<?php echo base_url();?>assets/resumable/resumable.js" type="text/javascript"></script>

    <script type="text/javascript">

      //START OF INITIATING VARIABLE=============================================================

      //variable global
      var course_id       = "<?php echo($course['info']['id']); ?>";

      //initiate variable chapter
      var browseButton = $('#chapter_video'),
          nothingToUpload = $('[data-nothingToUpload]'),
          results = $('#results'),
          r = new Resumable({
              target: base_url + post_url + create_chapter_url_vid,
              query: {},
              maxChunkRetries: 5,
              maxFiles: 3,
              prioritizeFirstAndLastChunk: true,
              simultaneousUploads: 4,
              chunkSize: 1 * 1024 * 1024
          });

      r.assignBrowse(browseButton);
      // r.assignDrop(draggable);

      r.on('fileAdded', function (file, event) {
              var template =
                  '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
                  '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
                  '<div class="large-6 right deleteFile" data-toggle="tooltip" title="Delete">X</div>'+
                  '<div class="progress large-6">' +
                  '<span class="meter" style="width:0%;"></span>' +
                  '</div>' +
                  '</div>';

              results.append(template);
              nothingToUpload.hide();
          });

      $(document).on('click', '.deleteFile', function () {
              var self = $(this),
                  parent = self.parent(),
                  identifier = parent.data('uniqueid'),
                  file = r.getFromUniqueIdentifier(identifier);

              r.removeFile(file);
              parent.remove();
              nothingToUpload.show();
          });


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

      function alertFailedHide_chapter(){
        $("#alertFailed_chapter").hide();
      }


      $("#save_chapter").click(function(){

         var  chapt_sequence        = $("#chapter_sequence").val(),
              chapt_title           = $("#chapter_title").val(),
              chapt_description     = $("#chapter_description").val();

        // console.log(base_url + post_url);
        $.ajax({
          type: 'POST',
          // dataType: "jsonp",
          url: base_url + post_url,
          data: {
                param: {
                    "course_id": course_id,
                    "sequence": chapt_sequence,
                    "tittle": chapter_title,
                    "description": chapt_description
                },
                url: create_chapter_url
            },
          
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            $('#message_chapter').text(jsonArr['message']);
            if (jsonArr['proc'] == 'true') {
              uploadVideo(jsonArr['data']['id']);
            }else{
              alertFailed_chapter();
            }
            
        }});
      });




      function uploadVideo (chapt_id) {

          if (results.children().length > 0) {
              r.upload();
          } else {
              nothingToUpload.show();
          }

          r.on('fileProgress', function (file) {
              var progress = Math.floor(file.progress() * 100);
              $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.meter').css('width', progress + '%');
              $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.meter').html('&nbsp;' + progress + '%');
          });

          r.on('fileSuccess', function (file, message) {
              $('[data-uniqueId=' + file.uniqueIdentifier + ']').find('.progress').addClass('success');
          });


          r.on('uploadStart', function () {
              // $('.alert-box').text('Uploading....');
          });

          r.on('complete', function () {
              $('#message_chapter').text('Upload Complete');
              alertSuccess_chapter();
          });

          r.on('fileError', function(file, message){
            $('#message_chapter').text('Upload Failed');
            alertFailed_chapter();
          });

      }
    </script>

  </body>
</html>
