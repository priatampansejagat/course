<?php
if ($data_course->data->mentor->detail == null) {
    $image = base_url('assets/visitor/images/logo-research-academy-grey.png');
} else {
    $image = $data_course->data->mentor->detail->profile_picture;
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
                <li><a href="home.html">Home</a></li>
                <li><a href="contact.html">Course</a></li>
                <li class="active"><?= $data_course->data->title ?></li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-9">
                <!-- content h1 -->
                <h1 class="content-h1 fw-semi"><?= $data_course->data->title ?></h1>
                <!-- view header -->
                <header class="view-header row">
                    <div class="col-xs-12 col-sm-9 d-flex">
                        <div class="d-col">
                            <!-- post author -->
                            <div class="post-author">
                                <div class="alignleft no-shrink rounded-circle">
                                    <a href="#"><img src="<?= $image ?>" class="rounded-circle" alt="image description"></a>
                                </div>
                                <div class="description-wrap">
                                    <h2 class="author-heading"><a href="#">Instructor</a></h2>
                                    <h3 class="author-heading-subtitle text-uppercase"><?= $data_course->data->mentor->fullname ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <h3 class="content-h3">Course Description</h3>
                <p><?= $data_course->data->description ?></p>
                <h2>About Instructor</h2>
                <!-- instructorInfoBox -->
                <div class="instructorInfoBox">
                    <div class="alignleft">
                        <a href="instructor-single.html"><img src="<?= $image ?>" alt="Intructor"></a>
                    </div>
                    <div class="description-wrap">
                        <h3 class="fw-normal"><a href="instructor-single.html"><?= $data_course->data->mentor->fullname ?></a></h3>
                        <h4 class="fw-normal"><?= $data_course->data->mentor->major_of_study ?></h4>
                        <p><?= $data_course->data->mentor->fullname ?> is someone who has an educational background in the <?= $data_course->data->mentor->major_of_study ?> who is active as a mentor at research-academy.org </p>
                        <a href="<?= base_url('mentordetail/' . $data_course->data->mentor->id) ?>" class="btn btn-default font-lato fw-semi text-uppercase">View Profile</a>
                    </div>
                </div>
            </article>
            <!-- sidebar -->
            <aside class="col-xs-12 col-md-3" id="sidebar">
                <!-- widget course select -->
                <section class="widget widget_box widget_course_select">
                    <header class="widgetHead text-center bg-theme">
                        <h3 class="text-uppercase">Take This Course</h3>
                    </header>
                    <label for="price">Price:</label>
                    <strong class="price element-block font-lato" id="price"><?= rupiah($data_course->data->price, "Idr") ?></strong>
                    <ul class="list-unstyled font-lato">
                        <li><i class="far fa-clock icn no-shrink"></i> Duration: 30 days</li>
                        <li><i class="fas fa-bullhorn icn no-shrink"></i> Lectures: 10</li>
                        <li><i class="far fa-address-card icn no-shrink"></i> Certificate of Completion</li>
                    </ul>
                </section>
                <!-- button register -->
                <section class="widget">
                    <div class="btns-wrap">
                        <a href="registcourse/<?= $data_course->data->id ?>" class="btn btn-warning btn-theme text-uppercase" style="width: 100%; color: black; font-weight: bold">register Now</a>
                    </div>
                </section>
            </aside>
        </div>
    </div>
</main>