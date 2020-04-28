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
                    <h4>Upload picture</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>

                  </div>
                  <div class="grid-body ">
                    
                    <div class="alert alert-info" id="alertSuccess_picture">
                      <button class="close" onclick="alertSuccessHide_picture()"></button>
                      <p id="message_picture"></p> </div>
                    <div class="alert alert-danger" id="alertFailed_picture">
                      <button class="close" onclick="alertFailedHide_picture()"></button>
                      <p id="message_picture"></p> </div>  
                    

                    <div class="grid-body no-border">
                      <!-- <form class="form-no-horizontal-spacing" id="form-condensed"> -->
                        <div class="row column-seperation">
                          <div class="col-md-12">

                            <div class="row form-row">
                              <input name="title" id="title" type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="row form-row">
                              
                              <div class="col-md-10">
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-white btn-cons" id="select_picture">Select File</button>
                                </div>
                                <div class="col-md-10">
                                  <div id="results_picture" class="panel"></div>
                                </div>  
                                
                              </div>
                              <div class="col-md-2">  
                                <div class="pull-right">
                                  <a id="upload_picture" onclick="add_gallery(this)" class="btn btn-primary" type="button"><i class="fa fa-cloud-upload"></i></a>
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
                          <th style="width: 50px;">Num.</th>
                          <th>Title</th>
                          <th>Link</th>
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
      
      var event_id       = "<?php echo($event['id']); ?>";

      var select_picture = $("#select_picture");
      var results_picture = $("#results_picture");
      var resumable_picture = new Resumable({
            target: noncurl_api_url + upload_gallery_event_url,
            maxChunkRetries: 5,
            query: {
                event_id: event_id,
                gallery_id:''
            },
            maxFiles: 3,
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });
      resumable_picture.assignBrowse(select_picture);



      $("#alertFailed_picture").hide();
      $("#alertSuccess_picture").hide();
      function alertSuccess_picture() {
        if ($("#alertSuccess_picture").is(":hidden")) {
          $("#alertSuccess_picture").show();
        }
      }
      function alertSuccessHide_picture(){
        $("#alertSuccess_picture").hide();
      }
      
      function alertFailed_picture() {
        if ($("#alertFailed_picture").is(":hidden")) {
          $("#alertFailed_picture").show();
        }
      }

      function alertFailedHide_picture(){
        $("#alertFailed_picture").hide();
      }


      // datatable
      function dataTable_refresh(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: {  "ihateapple" : event_gallery_dic,
                            "event_id" : event_id
                          },
                  url: get_datatable_url
              },
            success: function(respons){
              // console.log(respons);
              var jsonArr = JSON.parse(respons);

              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data']['gallery_list'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);
                var picture_link = jsonArr['data']['gallery_list'][i]['picture_link'];
                var data = [
                          '',
                          i+1,
                          jsonArr['data']['gallery_list'][i]['title'],
                          '<a href="'+picture_link+'" class="btn btn-success" target="_blank"> Click to see picture </a> ',
                          '<a onclick="delete_picture(this)" class="btn btn-danger" id="'+jsonArr['data']['gallery_list'][i]['id']+'" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> ' 

                ];
                $("#example2").DataTable().fnAddData(data); 

              } 

          }});
      }
      dataTable_refresh();


      function add_gallery(obj){
        // alert(resumable_picture.opts.query.event_id);
        var title = $("#title").val();
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: {  
                            "title" : title,
                            "event_id" : event_id
                          },
                  url: create_gallery_event_url
              },
            success: function(respons){
              var jsonArr = JSON.parse(respons);
              resumable_picture.opts.query.gallery_id=jsonArr['data']['id'];
              // alert('asdsad = ' +resumable_picture.opts.query.gallery_id);
              upload_picture();

          }});

      }

      resumable_picture.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile_picture" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_picture.append(template);

      });

      $(document).on('click', '.deleteFile_picture', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_picture.getFromUniqueIdentifier(identifier);

        resumable_picture.removeFile(file);
        parent.remove();
      });

      function upload_picture() {
          
          if (results_picture.children().length > 0) {
            // alert(resumable_picture.query());
              resumable_picture.upload();
          } else {
              // nothingToUpload.show();
          }

          resumable_picture.on('fileProgress', function (file) {
              
          });

          resumable_picture.on('fileSuccess', function (file, message) {
              
          });

          resumable_picture.on('uploadStart', function () {
              
          });

          resumable_picture.on('complete', function () {
              $('#message_picture').text('Upload Complete');
              alertSuccess_picture();
              $('.deleteFile_picture').click();
              dataTable_refresh();
          });

          resumable_picture.on('fileError', function(file, message){
            $('#message_picture').text('Upload Failed');
            alertFailed_picture();
            $('.deleteFile_picture').click();
          });

      }

      function delete_picture(obj){
        var gallery_id = obj.id;
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "event_id": event_id,
                    "gallery_id": gallery_id
                },
                url: delete_picture_event_url
            },
            success: function(respons) {
              dataTable_refresh();
              alert('Success');
            }
        });
      }

    </script>

  </body>
</html>
