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


            <div class="row 2col">
              <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                <div class="tiles blue added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title"> NUMBER OF COURSES </div>
                    <div class="heading" id="course_cage">  </div>
                    
                    <div class="description"><i class="fa fa-book"></i><span class="text-white mini-description ">&nbsp; Number of courses available today</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                <div class="tiles purple added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title">  NUMBER OF EVENTS </div>
                    <div class="heading" id="events_cage"> </div>
                    
                    <div class="description"><i class="fa fa-rocket"></i><span class="text-white mini-description ">&nbsp; Number of events available today</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 spacing-bottom">
                <div class="tiles green added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title"> MENTORS </div>

                    <div class="heading" id="mentors_cage"> </div>
                    
                    <div class="description"><i class="fa fa-key"></i><span class="text-white mini-description ">&nbsp; Total mentors</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row 2col">
              <div class="col-md-6 col-sm-6 spacing-bottom-sm spacing-bottom">
                <div class="tiles green added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title"> PAYMENT </div>
                    <div class="heading" id="incPay_cage"> </div>
                    
                    <div class="description"><i class="fa fa-book"></i><span class="text-white mini-description ">&nbsp; Incomplete payments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 spacing-bottom-sm spacing-bottom">
                <div class="tiles red added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title">  PAYMENTS </div>
                    <div class="heading" id="paidPay_cage"> </div>
                    
                    <div class="description"><i class="fa fa-rocket"></i><span class="text-white mini-description ">&nbsp; Paid, but not confirmed yet by admin</span>
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

    <script src="<?php echo base_url();?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/assets/js/datatables.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
      

      

      function get_AvailableCourses(){
        $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
                param: { 
                  "ihateapple": course_dic
                },
                url: get_datatable_url
            },
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            // alert(jsonArr['data'].length);
            // $("#numcourse").attr('data-value',jsonArr['data'].length);
            $("#course_cage").html('<span class="animate-number" data-value="'+jsonArr['data'].length+'" data-animation-duration="1200">'+jsonArr['data'].length+'</span>');

        }});
      }

      function get_AvailableEvents(){
         $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
                param: { 
                  "ihateapple": event_dic
                },
                url: get_datatable_url
            },
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            // alert(jsonArr['data'].length);
            // $("#numcourse").attr('data-value',jsonArr['data'].length);
            $("#events_cage").html('<span class="animate-number" data-value="'+jsonArr['data'].length+'" data-animation-duration="1200">'+jsonArr['data'].length+'</span>');

        }});
      }

      function get_Mentors(){
        $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
                param: { 
                  "ihateapple": mentor_dic
                },
                url: get_datatable_url
            },
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            // alert(jsonArr['data'].length);
            // $("#numcourse").attr('data-value',jsonArr['data'].length);
            $("#mentors_cage").html('<span class="animate-number" data-value="'+jsonArr['data'].length+'" data-animation-duration="1200">'+jsonArr['data'].length+'</span>');

        }});
      }

      function get_IncompletePayments(){
        $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
                param: { 
                  "ihateapple": payment_incomplete
                },
                url: get_datatable_url
            },
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            // alert(jsonArr['data'].length);
            // $("#numcourse").attr('data-value',jsonArr['data'].length);
            $("#incPay_cage").html('<span class="animate-number" data-value="'+jsonArr['data'].length+'" data-animation-duration="1200">'+jsonArr['data'].length+'</span>');

        }});
      }

      function get_NeedConfirmPayment(){
        $.ajax({
          type: 'POST',
          url: base_url + post_url,
          data: {
                param: { 
                  "ihateapple": payment_paid
                },
                url: get_datatable_url
            },
          success: function(respons){
            // console.log(respons);
            var jsonArr = JSON.parse(respons);
            // alert(jsonArr['data'].length);
            // $("#numcourse").attr('data-value',jsonArr['data'].length);
            $("#paidPay_cage").html('<span class="animate-number" data-value="'+jsonArr['data'].length+'" data-animation-duration="1200">'+jsonArr['data'].length+'</span>');

        }});
      }

      function triggerStatistic(){
        get_AvailableCourses();
        get_AvailableEvents();
        get_Mentors();
        get_IncompletePayments();
        get_NeedConfirmPayment();
      }
      triggerStatistic();

    </script> 
     
  </body>
</html>
