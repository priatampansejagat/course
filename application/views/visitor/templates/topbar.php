<!-- main container of all the page elements -->
<div id="wrapper">
    <!-- header of the page -->
    <?php if (strcasecmp($title, 'home')  == 0) { ?>
        <header id="page-header" class="page-header-stick">
        <?php } else { ?>
            <header id="page-header">
            <?php } ?>
            <!-- header holder -->
            <div class="header-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <!-- logo -->
                            <div class="logo">
                                <a href="visitor">
                                    <img class="hidden-xs" src="<?= base_url(); ?>assets/visitor/images/logo.png" alt="studylms">
                                    <img class="hidden-sm hidden-md hidden-lg" src="<?= base_url(); ?>assets/visitor/images/logo-dark.png" alt="studylms">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-9 static-block">
                            <!-- nav -->
                            <nav id="nav" class="navbar navbar-default">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- navbar collapse -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <!-- main navigation -->
                                    <ul class="nav navbar-nav navbar-right main-navigation text-uppercase font-lato">
                                        <li>
                                            <a href="visitor">home</a>
                                        </li>
                                        <li>
                                            <a href="courselist">course list</a>
                                        </li>
                                        <li>
                                            <a href="mycourse">my course</a>
                                        </li>
                                        <li>
                                            <a href="payment">Payment Confirmation</a>
                                        </li>
                                        <?php if ($this->session->userdata('id')) { ?>
                                            <li class="dropdown">
                                                <a href="#" class="btn btn-warning btn-theme text-uppercase dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 10px 20px; border-radius: 25px"><?= $this->session->userdata('username') ?></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="home.html">Upload File</a></li>
                                                    <li><a href="setting">Settings</a></li>
                                                    <li><a href="home3.html">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="login" class="btn btn-warning btn-theme text-uppercase" style="padding: 10px;">Login</a>
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