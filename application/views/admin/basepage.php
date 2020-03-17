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
            <div class="page-title">
              <h3>KONTENNYA DISINI WKWKWK. </h3>
              <h5>- BASEPage jangan dipakai, karena untuk bikin halaman baru, cukup copy file ini lalu file copy boleh di edit :)</h5>
              <h5>- Harapannya tidak perlu lagi otak-atik folder layouts</h5>
              <h5>- Penambahan konten apapun Insya Allah bisa di line atau div ini</h5>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTAINER -->
      </div>

    <!-- jshandler -->
    <?php $this->load->view('admin/layouts/jshandler');  ?>

  </body>
</html>
