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
                <li class="active"><a href="contact.html">Class</a></li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-12">
                <!-- content h1 -->
                <h1 class="content-h1 fw-semi" id="course_title"></h1>
                <h2 class="content-h1 fw-semi" id="chapter_title"></h2>
                <!-- view header -->
                <header class="view-header row">
                    <div class="col-xs-12 col-sm-12 d-flex">
                        <div class="d-col">
                            <!-- post author -->
                            <div class="post-author">
                                <div class="alignleft no-shrink rounded-circle">
                                    <a href="#"><img src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-grey.png" class="rounded-circle" alt="image description"></a>
                                </div>
                                <div class="description-wrap">
                                    <h2 class="author-heading"><a href="#">Instructor</a></h2>
                                    <h3 class="author-heading-subtitle text-uppercase" id="mentor"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <h3 class="content-h3">Course Description</h3>
                <p id="description"></p>
                <div id="video"></div>
                <h2>About Instructor</h2>
                <!-- instructorInfoBox -->
                <div class="instructorInfoBox">
                    <div class="alignleft">
                        <img class="center" src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-grey.png" alt="Merry Jhonson" style="width: 97px;">
                    </div>
                    <div class="description-wrap">
                        <h3 class="fw-normal mentor_name" id="mentor_name">Merry Jhonson</h3>
                        <h4 class="fw-normal major_of_study" id="major_of_study">Back-end Developer</h4>
                        <p><span class="mentor_name"></span> is someone who has an educational background in the <span class="major_of_study"></span> who is active as a mentor at research-academy.org </p>
                        <a href="" class="btn btn-warning" id="btn-profil">view profil</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": "mycourse_room",
                    "user_id": "<?= $this->session->userdata["id"] ?>",
                    "course_id": "<?= $course_id ?>",
                    "single_chapter": true,
                    "chapter_id": "<?= $chapter_id ?>",
                },

                url: get_datatable_url
            },
            success: function(data) {
                var dataJson = JSON.parse(data);
                $.each(dataJson.data.course_chapter, function(key, value) {
                    $("#description").text(dataJson.data.course_detail.description);
                    $("#mentor").text(dataJson.data.mentor.fullname);
                    $("#course_title").text(dataJson.data.course_detail.title);
                    $("#chapter_title").text("Chapter: " + value.tittle);
                    $(".mentor_name").text(dataJson.data.mentor.fullname);
                    $(".major_of_study").text(dataJson.data.mentor.major_of_study);
                    $("#btn-profil").attr("href", '<?= base_url("mentordetail/") ?>' + dataJson.data.mentor.detail.id);
                    $("#video").append('<video width="100%" controls>' +
                        '<source src="' + value.video_link + '" type="video/mp4">' +
                        '<source src="' + value.video_link + '" type="video/ogg">' +
                        'Your browser does not support the video tag.' +
                        '</video>');
                });
            }
        });
    });

    //# sourceURL=/view/class/video.js
</script>