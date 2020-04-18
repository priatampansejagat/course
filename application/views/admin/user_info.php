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
		                            <div class="name"><?php echo $data['user']['username']; ?></div>
		                            <div class="description">Username</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['username']; ?></div>
		                            <div class="description">Username</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['username']; ?></div>
		                            <div class="description">Username</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['username']; ?></div>
		                            <div class="description">Username</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li>
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['username']; ?></div>
		                            <div class="description">Username</div>
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
		                        <div class="heading"> 8,545,654 <i class="fa fa-map-marker"></i> </div>
		                      </div>
		                      <div id="world-map" style="height:405px"></div>
		                    </div>
		                    <div class="clearfix"></div>
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
