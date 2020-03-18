<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php
      $this->load->helper(array('form', 'url'));

      $this->load->view('registered/layouts/header');

      $this->load->view('registered/layouts/csshandler');
    ?>

  </head>

  <body class="">

      <!-- Menu Bar Top -->
      <?php $this->load->view('registered/layouts/menubartop');  ?>

      <div class="page-container row-fluid">
        <!-- aside -->
        <?php $this->load->view('registered/layouts/menubar');  ?>
        


        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">
          <div class="content">
            <div class="page-title">
              <h3>KONTENNYA DISINI WKWKWK. BASEPage jangan dipakai. untuk bikin halaman baru, cukup copy file ini :)</h3>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTAINER -->
      </div>

    <!-- jshandler -->
    <?php $this->load->view('registered/layouts/jshandler');  ?>

  </body>
</html>
