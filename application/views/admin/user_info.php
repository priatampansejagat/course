<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('admin/layouts/header');

      $this->load->view('admin/layouts/csshandler');
    ?>

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
            <div id="container">
            	<div class="row">


            		<div class="col-md-8 spacing-bottom">
            			<div class="row tiles-container tiles white spacing-bottom">
		                  <div class="tile-more-content col-md-4 col-sm-4 no-padding">
		                    <div class="tiles green">
		                      <div class="tiles-body">
		                        <div class="heading"> <?php echo $data['user']['fullname']; ?> </div>
		                        <p><?php echo $data['user']['email']; ?></p>
		                      </div>
		                      <div class="tile-footer">
		                        <div class="iconplaceholder"><i class="fa fa-map-marker"></i></div>
		                        <?php echo $data['user']['country']; ?> </div>
		                    </div>
		                    <div class="tiles-body">
		                      <ul class="progress-list">
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['place_of_birth']; ?></div>
		                            <div class="description">Place of Birth</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['date_of_birth']; ?></div>
		                            <div class="description">Date of birth</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['institution']; ?></div>
		                            <div class="description">Institution</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['phone_number']; ?></div>
		                            <div class="description">Phone Number</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['profesion']; ?></div>
		                            <div class="description">Profesion</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['major_of_study']; ?></div>
		                            <div class="description">Major of Study</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        
		                        <!-- 
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name">Other Visits</div>
		                            <div class="description">Our Overseas visits</div>
		                          </div>
		                          <div class="details-status pull-right"> <span class="animate-number" data-value="12" data-animation-duration="200">0</span>% </div>
		                          <div class="clearfix"></div>
		                          <div class="progress progress-small no-radius">
		                            <div class="progress-bar progress-bar-danger animate-progress-bar" data-percentage="12%"></div>
		                          </div>
		                        </li> -->
		                      </ul>
		                    </div>
		                  </div>
		                  <div class="tiles white col-md-8 col-sm-8 no-padding">
		                    <div class="tiles-chart">
		                      <div class="controller">
		                        <!-- <a href="javascript:;" class="reload"></a> -->
		                        <!-- <a href="javascript:;" class="remove"></a> -->
		                      </div>
		                      <div class="tiles-body">
		                        <div class="tiles-title">PROFILE PICTURE</div>
		                        <div class="heading"> 

		                        </div>
		                      </div>
		                      <div style="height:405px">



		                      </div>
		                    </div>
		                    <div class="clearfix"></div>
		                  </div>
		                </div>
            		</div>

            		<div class="col-md-4">
		                <div class="row spacing-bottom ">
		                  <div class="col-md-12">
		                    <div class="tiles purple added-margin">
		                      <div class="tiles-body">
		                        <div class="controller">
		                        </div>
		                        <div class="tiles-title"> INCOMPLETE PAYMENT </div>
							    	
			                      <ul class="progress-list">
			                        
			                        <?php foreach ($data['payment'] as $key => $value) { ?>
			                        	
			                        	<li>
				                          <div class="details-wrapper">
				                            <div class="name">Pay for : <?php echo $value['pay_for']; ?></div>
				                            <div class="heading"> <span ><?php echo $value['course']['title']; ?></span> </div>
				                          </div>
				                          <div class=" pull-right"> 


				                          </div>
				                          <div class="clearfix"></div>
				                        </li>
			                        
			                        <?php } ?>
			                        
			                      </ul>
		                        
		                      </div>
		                    </div>
		                    <div class="tiles white added-margin">
		                      <div id="chart"> </div>
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

  </body>
</html>
