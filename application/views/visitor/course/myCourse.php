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
                <li><a href="visitor">Home</a></li>
                <li class="active">My Course</li>
            </ol>
        </div>
    </nav>
    <!-- upcoming events block -->
    <section class="upcoming-events-block container">
        <!-- upcoming events list -->
        <ul class="list-unstyled upcoming-events-list myCourse">
        </ul>
        <nav aria-label="Page navigation">
            <!-- pagination -->
            <ul class="pagination">
            </ul>
        </nav>
    </section>
</main>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": "mycourse",
                    "user_id": "<?= $this->session->userdata["id"] ?>"
                },

                url: get_datatable_url
            },
            success: function(data) {
                var pageSize = 10;
                var course = $('.myCourse');
                var dataJson = JSON.parse(data);
                var pageCount = dataJson.data.length / pageSize;

                $.each(dataJson.data, function(key, value) {
                    var date_custom = new Date(Date.parse(value.course_detail.start_date));
                    course.append('<li class="course-data">' +
                        '<div class="alignleft">' +
                        '<time datetime="2011-01-12" class="time text-uppercase">' +
                        '<strong class="date fw-normal">' + (date_custom.getDate() < 10 ? '0' + date_custom.getDate() : date_custom.getDate()) + '</strong>' +
                        '<strong class="month fw-light font-lato">' + month(date_custom.getMonth()) + '</strong>' +
                        '<strong class="day fw-light font-lato">' + (date_custom.getFullYear()) + '</strong>' +
                        '</time>' +
                        '</div>' +
                        '<div class="description-wrap">' +
                        '<h3 class="list-heading">' + value.course_detail.title + '</h3>' +
                        '<address> by : ' + value.mentor.fullname + '</address>' +
                        '</div>' +
                        '<div>' +
                        '<a href="classdetail/' + value.course_detail.id + '" class="btn btn-warning text-uppercase">See Class</a>' +
                        '</div>' +
                        '</li>');
                });

                for (var i = 0; i < pageCount; i++) {
                    $(".pagination").append('<li><a href="#">' + (i + 1) + '</a></li> ');
                }
                $(".pagination li").first().addClass("active");

                showPage = function(page) {
                    $(".course-data").hide();
                    $(".course-data").each(function(n) {
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

                if (pageCount == 0) {
                    course.append('<div class="alert alert-danger show fadeIn animated text-center" style="width:100% !important; margin-bottom:20px !important;">' +
                        '<div class="description-wrap">' +
                        '<h3 class="list-heading"><strong>Sorry,</strong> Data Not Found</h3>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    });

    function month(params) {
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";

        return month[params];
    }
</script>