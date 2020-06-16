<!-- main container of all the page elements -->
<div id="wrapper">
    <!-- header of the page -->
    <?php if (strcasecmp($title, 'home')  == 0) {
        $logo = "logo-research-academy.png";
    ?>
        <header id="page-header" class="page-header-stick">
        <?php } else {
        $logo = "logo-research-academy-dark.png"
        ?>
            <header id="page-header">
            <?php } ?>
            <!-- header holder -->
            <div style="header-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <!-- logo -->
                            <div class="logo">
                                <a href="<?= base_url('visitor') ?>">
                                    <?php if (strcasecmp($title, 'home')  == 0) { ?>
                                    <?php } else { ?>
                                        <img class="hidden-xs" src="<?= base_url(); ?>assets/visitor/images/<?= $logo ?>" style="width: 70%" alt="studylms">
                                    <?php } ?>
                                    <img class="hidden-sm hidden-md hidden-lg" src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-dark.png" style="width: 50%" alt="studylms">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-9 static-block">
                            <!-- nav -->
                            <nav id="nav" class="navbar navbar-default">
                                <div class="navbar-header" style="padding-top: 15px;">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- navbar collapse -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top: 35px; padding-bottom: 15px">
                                    <!-- main navigation -->
                                    <ul class="nav navbar-nav navbar-right main-navigation text-uppercase font-lato">
                                        <li>
                                            <a href="<?= base_url('visitor') ?>">home</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('courselist') ?>">course list</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('eventlist') ?>">event list</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('') ?>">publication</a>
                                        </li>
                                        <?php if (($this->session->userdata('id'))) { ?>
                                            <li>
                                                <a href="<?= base_url('mycourse') ?>">my course</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('myevent') ?>">my event</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('payment') ?>">Payment</a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('id')) { ?>
                                            <li class="dropdown">
                                                <a href="#" class="btn btn-warning btn-theme text-uppercase dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 10px 20px; border-radius: 25px"><?= substr($this->session->userdata["username"], 0, 6); ?></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= base_url('setting') ?>">Settings</a></li>
                                                    <li><a href="<?= base_url('change_password') ?>">Change Password</a></li>
                                                    <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="<?= base_url('login') ?>" class="btn btn-warning btn-theme text-uppercase" style="padding: 10px 20px; border-radius: 25px">Login</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </header>