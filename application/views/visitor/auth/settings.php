<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(<?= base_url(); ?>assets/visitor/images/banner.png);">
        <div class="container holder">
            <div class="align">
                <h1><?= $page_title ?></h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Profile</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>
    </nav>
    <!-- user log block -->
    <section class="container user-log-block">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <!-- user log form -->
                <form action="#" class="user-log-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Student Card</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="file" id="1" name="1" class="form-control element-block" placeholder="Username or email address *">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="2">Academic Member</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="file" id="2" name="2" class="form-control element-block" placeholder="Username or email address *">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="2">Profile Picture</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="file" id="2" name="2" class="form-control element-block" placeholder="Username or email address *">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <label for="2"> &nbsp;</label>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="btns-wrap">
                                <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>