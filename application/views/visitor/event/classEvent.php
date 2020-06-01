<!-- contain main informative part of the site -->
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
                <li class="active">Class</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-12">
                <div class="row flex-wrap chapter-list">
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                    </ul>
                </nav>
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
                    "ihateapple": "myevent_room",
                    "user_id": "<?= $this->session->userdata["id"] ?>",
                    "course_id": "<?= $course_id ?>",
                    'event_id': "<?= $event_id ?>"
                },

                url: get_datatable_url
            },
            success: function(data) {
                var pageSize = 9;
                var list = $('.chapter-list');
                var dataJson = JSON.parse(data);
                var pageCount = dataJson.data.course_chapter.length / pageSize;
                var image = 'src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-grey.png"'

                $.each(dataJson.data.course_chapter, function(key, value) {
                    list.append('<div class="col-xs-12 col-sm-6 col-lg-4 class-data">' +
                        '<article class="popular-post">' +
                        '<div class="aligncenter">' +
                        '<img ' + image + ' alt="image description">' +
                        '</div>' +
                        '<h3 class="post-heading"><a href="<?= base_url() ?>eventdetail/lesson/' + dataJson.data.course_detail.id + '/' + value.id + '">' + value.tittle + '</a></h3>' +
                        '<div class="post-author">' +
                        '<h4 class="author-heading">by: ' + dataJson.data.mentor.fullname + '</h4>' +
                        '</div>' +
                        '</article>' +
                        '</div>');
                });

                list.append('<div class="col-xs-12 col-sm-6 col-lg-4 class-data">' +
                    '<article class="popular-post">' +
                    '<div class="aligncenter">' +
                    '<img ' + image + ' alt="image description">' +
                    '</div>' +
                    '<h3 class="post-heading"><a href="<?= base_url() ?>taskevent/' + dataJson.data.course_detail.id + '/' + dataJson.data.event_member.event_id + '">' + 'Task Submission' + '</a></h3>' +
                    '<div class="post-author">' +
                    '<h4 class="author-heading">by: ' + dataJson.data.mentor.fullname + '</h4>' +
                    '</div>' +
                    '</article>' +
                    '</div>');

                $.ajax({
                    type: 'POST',
                    url: base_url + post_url,
                    data: {
                        param: {
                            "ihateapple": "cert_status_ver2",
                            "user_id": "<?= $this->session->userdata["id"] ?>",
                            "course_id": "<?= $course_id ?>",
                            "event_id": "<?= $event_id ?>"
                        },

                        url: get_datatable_url
                    },
                    success: function(data) {
                        var list = $('.chapter-list');
                        var dataJson = JSON.parse(data);
                        var image = 'src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-grey.png"'

                        list.append('<div class="col-xs-12 col-sm-6 col-lg-4 class-data">' +
                            '<article class="popular-post">' +
                            '<div class="aligncenter">' +
                            '<img ' + image + ' alt="image description">' +
                            '</div>' +
                            '<h3 class="post-heading"><a href="<?= base_url() ?>certificate/' + dataJson.data.course_id + '/' + dataJson.data.id + '/' + '" target="_blank">' + 'Certificate of Completion' + '</a></h3>' +
                            '<div class="post-author">' +
                            '<h4 class="author-heading">by: Research Academy </h4>' +
                            '</div>' +
                            '</article>' +
                            '</div>');
                    }
                });

                for (var i = 0; i < pageCount; i++) {
                    $(".pagination").append('<li><a href="#">' + (i + 1) + '</a></li> ');
                }
                $(".pagination li").first().addClass("active");

                showPage = function(page) {
                    $(".class-data").hide();
                    $(".class-data").each(function(n) {
                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                            $(this).show();
                    });
                }

                showPage(1);

                $(".pagination li").click(function() {
                    $(".pagination li").removeClass("active");
                    $(this).addClass("active");
                    showPage(parseInt($(this).text()))
                });
            }
        });
    });

    //# sourceURL=/view/class/list.js
</script>