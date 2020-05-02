<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  $this->load->helper(array('form', 'url'));

  $this->load->view('admin/layouts/header');
  ?>
  <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

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

        <div class="row-fluid" id="formaddcourse">
          <div class="span12">
            <div class="grid simple ">
              <div class="grid-title">
                <h4>Add New Course</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                </div>

              </div>
              <div class="grid-body ">

                <div class="alert alert-info" id="alertSuccess">
                  <button class="close" onclick="alertSuccessHide()"></button>
                  <p id="message"></p>
                </div>
                <div class="alert alert-danger" id="alertFailed">
                  <button class="close" onclick="alertFailedHide()"></button>
                  <p id="message"></p>
                </div>


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
                          <input type='text' placeholder="Start Date" class="form-control" id='start_date' name="start_date" />
                        </div>
                        <div class="col-md-6">
                          <input type='text' placeholder="End Date" class="form-control" id='end_date' name="end_date" />
                        </div>
                      </div>

                      <div class="row form-row">
                        <div class="col-md-12">

                          <!-- <span class="label-input100">Country</span> -->
                          <select class="form-contro" id="mentor_id" name="mentor_id" placeholder="Choose Course Mentor" type="text">
                            <option value="" selected disabled>Select Mentor</option>

                            <?php foreach ($mentor_list as $key => $value) { ?>
                              <option value="<?php echo ($value['id']); ?>"><?php echo ($value['fullname']); ?></option>
                            <?php } ?>

                          </select>
                          <!-- <span class="focus-input100"></span> -->

                        </div>

                      </div>

                      <div class="row form-row">

                        <div class="col-md-12">
                          <input name="price" id="price" type="text" class="form-control" placeholder="Price Rp...">
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

        <div class="row-fluid">
          <div class="span12">
            <div class="grid simple ">
              <div class="grid-title">
                <h4>COURSES</h4>
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
                      <th>Num</th>
                      <th>Course</th>
                      <th>Mentor</th>
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
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS INIT -->
  <script src="<?php echo base_url(); ?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
  <!-- END JAVASCRIPTS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

  <script type="text/javascript">
    $("#formaddcourse").hide();

    function addcourse() {
      if ($("#formaddcourse").is(":hidden")) {
        $("#formaddcourse").show();
      } else {
        $("#formaddcourse").hide();
      }
    }

    $("#alertFailed").hide();
    $("#alertSuccess").hide();

    function alertSuccess() {
      if ($("#alertSuccess").is(":hidden")) {
        $("#alertSuccess").show();
      }
    }

    function alertSuccessHide() {
      $("#alertSuccess").hide();
    }

    function alertFailed() {
      if ($("#alertFailed").is(":hidden")) {
        $("#alertFailed").show();
      }
    }

    function alertFailedHide() {
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




    $("#savecourse").click(function() {

      var title = $('#title').val();
      var description = $('#description').val();
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      var mentor_id = $('#mentor_id').val();
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
            "mentor_id": mentor_id,
            "price": price
          },
          url: create_course_url
        },

        success: function(respons) {
          // console.log(respons);
          var jsonArr = JSON.parse(respons);
          $('#message').text(jsonArr['message']);
          if (jsonArr['proc'] == 'true') {
            dataTable_refresh();
            alertSuccess();
          } else {
            alertFailed();
          }

        }
      });
    });

    // datatable
    function dataTable_refresh() {
      $.ajax({
        type: 'POST',
        url: base_url + post_url,
        data: {
          param: {
            "ihateapple": course_dic
          },
          url: get_datatable_url
        },
        success: function(respons) {
          // alert(respons);
          var jsonArr = JSON.parse(respons);

          $("#example2").DataTable().fnClearTable();
          for (var i = 0; i < jsonArr['data'].length; i++) {
            // console.log('datatable =' + jsonArr['data'][i]['id']);
            var data = [
              '',
              i + 1,
              jsonArr['data'][i]['title'],
              jsonArr['data'][i]['mentor']['fullname'],
              jsonArr['data'][i]['price'],
              '<a onclick="delcourse(this)" class="btn btn-danger" id="' + jsonArr['data'][i]['id'] + '" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> ' +
              '<a class="btn btn-primary" href="course/' + jsonArr['data'][i]['id'] + '" data-toggle="tooltip" title="Detail & Setting" ><i class="fa fa-cogs"></i></a> ' +
              '<a class="btn btn-success" href="course/participant/' + jsonArr['data'][i]['id'] + '" data-toggle="tooltip" title="Participant" ><i class="fa fa-users"></i></a>'

            ];
            $("#example2").DataTable().fnAddData(data);

          }

        }
      });
    }
    dataTable_refresh();


    function delcourse(obj) {
      alert(obj.id);
    }



    //# sourceURL=/view/course/list.js
  </script>

</body>

</html>