<?php
if ($data_user->user_detail == null) {
    $image = base_url('assets/visitor/images/logo-research-academy-grey.png');
    $desc = '<p>' . $data_user->user->fullname . ' is someone who has an educational background in the ' .  $data_user->user->major_of_study . ' who is active as a mentor at research-academy.org </p>';
} else {
    $image = $data_user->user_detail->profile_picture;
    $desc = $data_user->user_detail->biography;
}
?>

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
                <li><a href="#">Home</a></li>
                <li><a href="#">Instructor</a></li>
                <li class="active"><?= $data_user->user->fullname ?></li>
            </ol>
        </div>
    </nav>
    <!-- instructor profile block -->
    <section class="container instructor-profile-block">
        <div class="row">
            <!-- profiler aside -->
            <aside class="col-xs-12 col-sm-4 col-lg-3 profiler-aside">
                <!-- profile info -->
                <div class="profile-info bg-dark">
                    <div class="aligncenter">
                        <img src="<?= $image ?>" alt="Lospher Cook" style="height:200px; width: 263px; object-fit: cover; object-position: 100% 50%;">
                    </div>
                    <p style="font-size: 20px; margin-bottom: 0px"><strong><?= $data_user->user->fullname ?></strong></p>
                    <dl>
                        <dt><i class="fas fa-map-marker-alt"></i></dt>
                        <dd>&nbsp;<?= $data_user->user->country ?></dd>
                        <dt><i class="fas fa-graduation-cap"></i></dt>
                        <dd>&nbsp;<?= $data_user->user->major_of_study ?></dd>
                        <dt><i class="far fa-envelope"></i></dt>
                        <dd>&nbsp;<?= $data_user->user->email ?></dd>
                    </dl>
                </div>
            </aside>
            <!-- profile desription content -->
            <article class="col-xs-12 col-sm-8 col-lg-9 profile-desription-content">
                <h3>Biography</h3>
                <?= $desc ?>
            </article>
        </div>
    </section>
</main>