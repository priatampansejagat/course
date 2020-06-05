    <!-- BEGIN CONTENT -->

    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar " id="main-menu">
      <!-- BEGIN MINI-PROFILE -->
      <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <div class="user-info-wrapper sm">
          <div class="profile-wrapper sm">
            <img src="<?= base_url(); ?>assets/admin/assets/img/profiles/profil.png" alt="" data-src="<?= base_url(); ?>assets/admin/assets/img/profiles/profil.png" data-src-retina="<?= base_url(); ?>assets/admin/assets/img/profiles/profil.png" width="69" height="69" />
          </div>
          <div class="user-info sm">
            <div class="username"><span class="text-capitalize">Halo, <strong><?= $_SESSION['username'] ?></strong></span></div>
            <div class="status">You are online</div>
          </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title sm">Menu</p>
        <ul>

          <?php

          $start = true;
          foreach ($menu as $key => $value) {
            if ($start) {
              $startactive = 'start active';
            } else {
              $startactive = '';
            }
          ?>
            <li class="<?php echo ($startactive); ?>">
              <a href="<?php echo base_url() . $value['link']; ?>"><i class="fa <?php echo ($value['icon']); ?>"></i> <span class="title"><?php echo $value['menu']; ?></span> <span class="selected"></span> </a>
            </li>

          <?php } ?>


          <!-- <li class="">
              <a href="#"> <i class="material-icons">email</i> <span class="title">Link</span> <span class=" badge badge-disable pull-right ">203</span>
              </a>
            </li>
            <li class="">
              <a href="javascript:;"> <i class="material-icons">more_horiz</i> <span class="title">Link</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="javascript:;"> Level 1 </a> </li>
                <li>
                  <a href="javascript:;"> <span class="title">Level 2</span> <span class=" arrow"></span> </a>
                  <ul class="sub-menu">
                    <li> <a href="javascript:;"> Sub Menu </a> </li>
                    <li> <a href="ujavascript:;"> Sub Menu </a> </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
              <a href="javascript:;"> <i class="material-icons"></i></a>
              <ul class="sub-menu">
                <li class="side-bar-widgets">
                  <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                  <ul class="folders">
                    <li>
                      <a href="#">
                        <div class="status-icon green"></div>
                        My quick tasks </a>
                    </li>
                  </ul>
                  <p class="menu-title">PROJECTS </p>
                  <div class="status-widget">
                    <div class="status-widget-wrapper">
                      <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                      <p>Redesign home page</p>
                    </div>
                  </div>
                </li>
              </ul>
            </li> -->
        </ul>


        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
      </div>
    </div>
    <a href="#" class="scrollup">Scroll</a>
    <div class="footer-widget">
      <div class="pull-right">
        <a href="<?php echo base_url() . 'logout'; ?>"><i class="material-icons">power_settings_new</i> Logout </a></div> 
      <div class="pull-left">
        <a href="<?php echo base_url() . 'settings'; ?>"><i class="material-icons">miscellaneous_services</i> Settings </a></div>  
    </div>
    <!-- END SIDEBAR -->