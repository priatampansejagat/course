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
                                  <input name="fullname" id="fullname" type="text" class="form-control" placeholder="Fullname">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-6">
                                  <input type="text" placeholder="Place of Birth" class="form-control" id="place_of_birth" name="place_of_birth">
                                </div>
                                <div class="col-md-6">

                                  <input type='text' placeholder="Date of Birth" class="form-control" id='date_of_birth' name="date_of_birth"/>

                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-6">
                                  <!-- <input name="country" id="country" type="text" class="form-control" placeholder="Country"> -->

                                  <!-- <span class="label-input100">Country</span> -->
                                  <select class="form-contro" id="country" name="country" placeholder="Choose your Country" type="text">
                                      <option value="" selected disabled>Select Country</option>
                                      <option value="indonesia">Indonesia</option>
                                      <option value="india">India</option>
                                      <option value="0">Others</option>
                                  </select>
                                  <!-- <span class="focus-input100"></span> -->

                                </div>
                                <div class="col-md-6">

                                  <div class="wrap-input100 validate-input m-b-23" id="country_inputan" data-validate="Username is required">
                                      <input class="form-contro" type="text" id="country_input" name="country_input" placeholder="Type your Country">
                                      <!-- <span class="focus-input100"></span> -->
                                  </div>
                                
                                </div>  
                              </div>
                              <!-- <div class="row form-row">
                                <div class="col-md-8">
                                  <div class="radio">
                                    <input id="male" type="radio" name="gender" value="male" checked="checked">
                                    <label for="male">Male</label>
                                    <input id="female" type="radio" name="gender" value="female">
                                    <label for="female">Female</label>
                                  </div>
                                </div>
                              </div> -->
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="email" id="email" type="text" class="form-control" placeholder="e-Mail">
                                </div>
                              </div>
                              <div class="row form-row">
                                
                                <div class="col-md-12">
                                  <input name="mobile_number" id="mobile_number" type="text" class="form-control" placeholder="Mobile Number">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h4> &nbsp; </h4>
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="institution" id="institution" type="text" class="form-control" placeholder="Institution">
                                </div>
                              </div>  
                              <div class="row form-row">
                                <div class="col-md-6">

                                  <!-- <div class="wrap-input100 validate-input m-b-23" data-validate="Status is required"> -->
                                      <!-- <span class="label-input100">Status</span> -->
                                      <select class="form-control" id="status" name="status" placeholder="Status">
                                          <option value="" selected disabled>Status</option>
                                          <option value="Bachelor">Bachelor/Diploma Student</option>
                                          <option value="Master">Master Student</option>
                                          <option value="Doctorate">Doctorate Student</option>
                                          <option value="Academics">Academics/Lecturer</option>
                                          <option value="Practitioner">Practitioner</option>
                                          <option value="0">Others</option>
                                      </select>
                                      <!-- <span class="focus-input100"></span> -->
                                  <!-- </div> -->

                                </div>
                                <div class="col-md-6">

                                  <div class="wrap-input100 validate-input m-b-23" id="status_inputan" data-validate="Status is required">
                                      <input class="form-control" type="text" id="status_input" name="status_input" placeholder="Type your Status">
                                      <!-- <span class="focus-input100"></span> -->
                                  </div>
                                
                                </div>  
                              </div>

                              <div class="row form-row">
                                <div class="col-md-6">
                                  <!-- <input name="field_of_study" id="field_of_study" type="text" class="form-control" placeholder="Field of Study"> -->
                                

                                  <!-- <div class="wrap-input100 validate-input m-b-23" data-validate="Field of Study is required"> -->
                                      <!-- <span class="label-input100">Field of Study</span> -->
                                      <select class="form-control" id="field_of_study" name="field_of_study" placeholder="Field of Study">
                                          <option value="" selected disabled>Field of Study</option>
                                          <option value="Economics">Economics</option>
                                          <option value="Management">Management</option>
                                          <option value="Accounting">Accounting</option>
                                          <option value="Psychology">Psychology</option>
                                          <option value="Religion">Religion</option>
                                          <option value="Culture">Culture</option>
                                          <option value="History">History</option>
                                          <option value="Sociology">Sociology</option>
                                          <option value="Political_Study">Political Study</option>
                                          <option value="Language">Language</option>
                                          <option value="Education">Education</option>
                                          <option value="Law">Law</option>
                                          <option value="Natural_Science">Natural Science</option>
                                          <option value="Engineering">Engineering</option>
                                          <option value="0">Others</option>
                                      </select>
                                      <!-- <span class="focus-input100"></span> -->
                                  <!-- </div>  -->

                                </div>

                                <div class="col-md-6">

                                  <div class="wrap-input100 validate-input m-b-23" id="study_inputan" data-validate="Study is required">
                                      <input class="form-control" type="text" id="study_input" name="study_input" placeholder="Type your Study">
                                      <!-- <span class="focus-input100"></span> -->
                                  </div>

                                </div>  



                              </div>
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input name="username" id="username" type="text" class="form-control" placeholder="Username">
                                </div>
                              </div>
                              <div class="row form-row">
                                <div class="col-md-6">
                                  <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                  <input name="password_confirm" id="password_confirm" type="password" class="form-control" placeholder="Insert Password Again">
                                  <span class="float-left p-t-5 p-b-5" style="font-size: 13px;" id="pesan_password_ulangi"></span>
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
                            <button name="savementor" id="savementor" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                            <a onclick="addmentor()" class="btn btn-white btn-cons" type="button">Cancel</a>
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
                            <th>Num</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Country</th>
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
    <!-- END PAGE LEVEL JS INIT -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


    <script type="text/javascript">
      $("#formaddmentor").hide();
      function addmentor() {
        if ($("#formaddmentor").is(":hidden")) {
          $("#formaddmentor").show();
        }else{
          $("#formaddmentor").hide();
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

      $('#date_of_birth').datepicker({
          format: 'yyyy-mm-dd',
      });


      $('#country_inputan').hide();
      $('#status_inputan').hide();
      $('#study_inputan').hide();
      $('#country').change(function() {
          var country = $('#country').val();
          if (country == 0) {
              $('#country_inputan').show();
          } else {
              $('#country_inputan').hide();
          }
      });
      $('#status').change(function() {
          var status = $('#status').val();
          if (status == 0) {
              $('#status_inputan').show();
          } else {
              $('#status_inputan').hide();
          }
      });
      $('#field_of_study').change(function() {
          var study = $('#field_of_study').val();
          if (study == 0) {
              $('#study_inputan').show();
          } else {
              $('#study_inputan').hide();
          }
      });

      $('#date_of_birth').change(function() {
          var dob = $('#date_of_birth').val();
          if (dob != '') {
              dob = new Date(dob);
              var today = new Date();
              var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
              $('#age').html(age + ' years old');
          }
      });

      $('#password_confirm').on('keyup', function() {
          if ($('#password').val() == $('#password_confirm').val()) {
              $('#pesan_password_ulangi').text("✓ Password Match").css('color', 'green');
          } else {
              $('#pesan_password_ulangi').text("✕ Password Does'nt Match").css('color', 'red');
          }
      });

      $("#savementor").click(function(){

        var fullname = $('#fullname').val();
        var place_of_birth = $('#place_of_birth').val();
        var date_of_birth = $('#date_of_birth').val();
        var email = $('#email').val();
        var institution = $('#institution').val();
        var country = $('#country').val() == 0 ? $('#country_input').val() : $("#country").val();
        var mobile_number = $('#mobile_number').val();
        var status = $('#status').val() == 0 ? $('#status_input').val() : $("#status").val();
        var field_of_study = $('#field_of_study').val() == 0 ? $('#study_input').val() : $("#field_of_study").val();
        var uname = $('#username').val();
        var password = $('#password').val();
        var password2 = $('#password_confirm').val();


        // console.log(base_url + post_url);
        $.ajax({
          type: 'POST',
          // dataType: "jsonp",
          url: base_url + post_url,
          data: {
                param: {
                    "uname": uname,
                    "password": password,
                    "fullname": fullname,
                    "place_of_birth": place_of_birth,
                    "date_of_birth": date_of_birth,
                    "email": email,
                    "institution": institution,
                    "country": country,
                    "mobile_number": mobile_number,
                    "status": status,
                    "field_of_study": field_of_study,
                    "as": 'd730bb9677663feb30d4c4e9d273c7c9c713e4d5b8eebf9218a2f587dd7c5d9b'
                },
                url: add_user_url
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

      dataTable_refresh();

      // datatable
      function dataTable_refresh(){

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                  param: { "ihateapple": mentor_dic },
                  url: get_datatable_url
              },
            success: function(respons){
              var jsonArr = JSON.parse(respons);

              $("#example2").DataTable().fnClearTable();
              for (var i = 0; i < jsonArr['data'].length ; i++) {
                // console.log('datatable =' + jsonArr['data'][i]['id']);

                var user_id= jsonArr['data'][i]['id'];
                var data = [
                          '',
                          i+1,
                          jsonArr['data'][i]['fullname'],
                          jsonArr['data'][i]['phone_number'],
                          jsonArr['data'][i]['country'],
                          '<a onclick="delmentor('+jsonArr['data'][i]['fullname']+')" class="btn btn-danger" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a> '+
                          '<a href="'+ base_url+ 'users/'+ user_id +'" class="btn btn-primary" data-toggle="tooltip" title="Detail" ><i class="fa fa-arrow-right"></i></a> '

                ];

                $("#example2").DataTable().fnAddData(data); 
              } 

          }});

      }


      function delmentor($id){
        alert('deleting mentor'+$id);
      }

    </script>


  </body>
</html>
