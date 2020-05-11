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
                <div id="message"></div>
                <h1 class="content-h1 fw-semi" id="course_title"></h1>
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
                <form action="#" class="user-log-form" name="form-payment">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <p style="margin-bottom: 30px">
                                    You can use this button to select files as assignment data for assignments on this course
                                </p>
                                <a href="#" id="choose_file" class="btn btn-warning">Choose File</a>
                                <div id="results"></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="btns-wrap">
                        <a href="#" id="send" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Send</a>
                    </div>
                </form>
                <h2>About Instructor</h2>
                <!-- instructorInfoBox -->
                <div class="instructorInfoBox">
                    <div class="alignleft">
                        <img class="center" src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-grey.png" alt="Merry Jhonson" style="width: 100%; object-fit: cover; object-position: 50% 50%;">
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
                },

                url: get_datatable_url
            },
            success: function(data) {
                var dataJson = JSON.parse(data);
                $.each(dataJson.data.course_chapter, function(key, value) {
                    $("#description").text(dataJson.data.course_detail.description);
                    $("#mentor").text(dataJson.data.mentor.fullname);
                    $("#course_title").text(dataJson.data.course_detail.title);
                    $(".mentor_name").text(dataJson.data.mentor.fullname);
                    $(".major_of_study").text(dataJson.data.mentor.major_of_study);
                    $("#btn-profil").attr("href", '<?= base_url("mentordetail/") ?>' + dataJson.data.mentor.id);
                });
            }
        });
    });

    var course_id = '<?= $course_id ?>',
        user_id = '<?= $this->session->userdata["id"] ?>',
        event_id = '<?= $event_id ?>',
        resumableButton = $("#choose_file"),
        results = $("#results"),
        resumable = new Resumable({
            target: noncurl_api_url + send_task_url,
            maxChunkRetries: 5,
            query: {
                course_id: course_id
            },
            maxFiles: 1,
            fileType: ['pdf', 'docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'ods', 'odt'],
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

    resumable.assignBrowse(resumableButton);

    resumable.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results.append(template);
    });

    $(document).on('click', '.deleteFile', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable.getFromUniqueIdentifier(identifier);

        resumable.removeFile(file);
        parent.remove();
    });

    $body = $("body");
    $("#send").click(function() {
        if (results.children().length > 0) {
            resumable.upload();
        } else {
            $('#message').html(
                '<div id="alertFadeOut" class="alert alert-danger alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                '<div class="alert-body">' +
                'Please, Choose the File to Upload' +
                '</div>' +
                '</div>');
            $("#alertFadeOut").delay(3000)
                .fadeOut(function() {
                    $(this).remove();
                });
        }

        resumable.on('fileProgress', function(file) {
            //Action
            $body.addClass("loading");
        });

        resumable.on('uploadStart', function() {
            // action
            $body.addClass("loading");
        });

        resumable.on('complete', function() {
            // Action
            console.log('sukses');
            resumable.removeFile();
            $body.removeClass("loading");
            $('#message').html(
                '<div id="alertFadeOut" class="alert alert-success alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                '<div class="alert-body">' +
                'File Upload Successful' +
                '</div>' +
                '</div>');
            $("#alertFadeOut").delay(3000)
                .fadeOut(function() {
                    $(this).remove();
                });
        });

        resumable.on('fileError', function(file, message) {
            //Action
            console.log('error');
            resumable.removeFile();
            $body.removeClass("loading");
            $('#message').html(
                '<div id="alertFadeOut" class="alert alert-danger alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                '<div class="alert-body">' +
                'File Failed to Upload' +
                '</div>' +
                '</div>');
            $("#alertFadeOut").delay(3000)
                .fadeOut(function() {
                    $(this).remove();
                });
        });
    });

    //# sourceURL=/view/class/task.js
</script>