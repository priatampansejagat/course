<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('admin/layouts/header');
    ?>
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

    <?php   
      $this->load->view('admin/layouts/csshandler');
    ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


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
                    <h4>Add New Event</h4>
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
                                <input name="title" id="title" type="text" class="form-control" placeholder="Title">
                              </div>
                            </div>
                            <div class="row form-row">
                              
                              <div class="col-md-12">

                                <textarea id="description" name="description" placeholder="Enter description ..." class="form-control" rows="5"></textarea>
                                
                              </div>
                             
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <h4> &nbsp; </h4>
                             
                            <div class="row form-row">
                              <div class="col-md-6">
                                <input type='text' placeholder="Start Date" class="form-control" id='start_date' name="start_date"/>
                              </div>
                              <div class="col-md-6">
                                <input type='text' placeholder="End Date" class="form-control" id='end_date' name="end_date"/>
                              </div>
                            </div>

                            <div class="row form-row">
                              
                              <div class="col-md-12">
                                <input name="price" id="price" type="text" class="form-control" placeholder="Price Rp...">
                              </div>

                            </div>



                            <div class="row small-text">
                              <p class="col-md-12">
                                This form is used to add a event. Events that have been added can be deleted in the table.
                              </p>
                            </div>
                          </div>
                        </div>
                        
                      <!-- </form> -->

                      <div class="form-actions">
                        <div class="pull-left">
                          
                        </div>
                        <div class="pull-right">
                          <button name="saveevent" id="saveevent" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                          <a onclick="addevent()" class="btn btn-white btn-cons" type="button">Cancel</a>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div class="row-fluid">
              <div class="span12">
                <div class="grid simple ">
                  <div class="grid-title">
                    <h4>EVENTS</h4>
                    <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                    </div>
                  </div>
                  <div class="grid-body ">
                    <table class="table table-striped" id="example2">
                      <thead>
                        <tr>
                          <th style="width: 50px;">Num</th>
                          <th>Event</th>
                          <th>Price</th>
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

     <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS INIT -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
      $("#formaddevent").hide();
      function addevent() {
        if ($("#formaddevent").is(":hidden")) {
          $("#formaddevent").show();
        }else{
          $("#formaddevent").hide();
        }
      }

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

      $('#start_date').datepicker({
          format: 'yyyy-mm-dd',
      });
      $('#start_date').change(function() {
          var dob = $('#date_of_birth').val();
          if (dob != '') {
              dob = new Date(dob);
              var today = new Date();
              var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
              $('#age').html(age + ' years old');
          }
      });

      $('#end_date').datepicker({
          format: 'yyyy-mm-dd',
      });
      $('#end_date').change(function() {
          var dob = $('#date_of_birth').val();
          if (dob != '') {
              dob = new Date(dob);
              var today = new Date();
              var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
              $('#age').html(age + ' years old');
          }
      });

      $("#saveevent").click(function(){

        var title = $('#title').val();
        var description = $('#description').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var price = $('#price').val();

        // console.log(base_url + post_url);
        $.ajax({
          type: 'POST',
          // dataType: "jsonp",
          url: base_url + post_url,
          data: {
                param: {
                    "title": title,
                    "description": description,
                    "start_date": start_date,
                    "end_date": end_date,
                    "price": price
                },
                url: create_event_url
            },
          
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            $('#message').text(jsonArr['message']);
            if (jsonArr['proc'] == 'true') {
              dataTable_refresh();
              alertSuccess();
            }else{
              alertFailed();
            }
            
        }});
      });

      // datatable
      function dataTable_refresh(){
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { "ihateapple": event_dic },
                  url: get_datatable_url
              },
            success: function(respons){
              // alert(respons);
              var jsonArr = JSON.parse(respons);

              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);
                var data = [
                          '',
                          i+1,
                          jsonArr['data'][i]['title'],
                          jsonArr['data'][i]['price'],
                          '<a onclick="delevent(this)" class="btn btn-danger" id="'+jsonArr['data'][i]['id']+'" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> ' +
                          '<a class="btn btn-primary" href="adm_event/'+jsonArr['data'][i]['id']+'" data-toggle="tooltip" title="Detail & Setting" ><i class="fa fa-cogs"></i></a> '+
                          '<a class="btn btn-success" href="adm_event/participant/'+jsonArr['data'][i]['id']+'" data-toggle="tooltip" title="Participant" ><i class="fa fa-users"></i></a> ' +
                          '<a class="btn btn-info" href="adm_event/gallery/'+jsonArr['data'][i]['id']+'" data-toggle="tooltip" title="Gallery" ><i class="fa fa-picture-o"></i></a>'


                ];
                $("#example2").DataTable().fnAddData(data); 

              } 

          }});
      }
      dataTable_refresh();

      function delevent(obj) {
        // alert("delete => "+obj.id);
        $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
            param: {
              "event_id": obj.id
            },
            url: delete_event_url
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
