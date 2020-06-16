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
                <input type="text" id="place_of_birth" name="place_of_birth" hidden>
                <input type="text" id="date_of_birth" name="date_of_birth" hidden>
                <input type="text" id="country" name="country" hidden>
                <input type="text" id="field_of_study" name="field_of_study" hidden>
                <input type="text" id="profesion" name="profesion" hidden>
                <div id="message"></div>
                <form action="#" class="user-log-form">
                    <p><b>User Data</b></p><hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Fullname</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="fullname" name="fullname" class="form-control element-block" placeholder="Insert your Fullname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Email</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="email" name="email" class="form-control element-block" placeholder="Insert your email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Institution</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="institution" name="institution" class="form-control element-block" placeholder="Insert your institution">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Mobile Number</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="phone_number" name="phone_number" class="form-control element-block" placeholder="Insert your Mobile Number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Status</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <select class="form-control element-block" id="status" name="status" placeholder="Status">
                                    <option value="" selected disabled>Status</option>
                                    <option value="Bachelor">Bachelor/Diploma Student</option>
                                    <option value="Master">Master Student</option>
                                    <option value="Doctorate">Doctorate Student</option>
                                    <option value="Academics">Academics/Lecturer</option>
                                    <option value="Practitioner">Practitioner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p style="padding-top: 50px"><b>Document for Completion</b></p><hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Student Card</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <a href="#" id="student_card" class="btn btn-warning">Choose File</a>
                                <div id="results_student_card"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="2">Academic Member</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <a href="#" id="academic_member" class="btn btn-warning">Choose File</a>
                                <div id="results_academic_member"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="2">Profile Picture</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <a href="#" id="profile_picture" class="btn btn-warning">Choose File</a>
                                <div id="results_profile_picture"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <label for="2"> &nbsp;</label>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="btns-wrap">
                                <a href="#" type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase" onclick="saveDataUser()">Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        loadData();
    });

    $body = $("body");

    function loadData() {
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": "single_user",
                    "user_id": "<?= $this->session->userdata["id"] ?>"
                },
                url: get_datatable_url
            },
            success: function(result) {
                var dataJson = JSON.parse(result);
                console.log(dataJson.data.user.fullname);
                $('#fullname').val(dataJson.data.user.fullname);
                $('#email').val(dataJson.data.user.email);
                $('#institution').val(dataJson.data.user.institution);
                $('#phone_number').val(dataJson.data.user.phone_number);
                $("#status option[value='" + dataJson.data.user.status + "']").attr("selected", true);

                $('#place_of_birth').val(dataJson.data.user.place_of_birth);
                $('#date_of_birth').val(dataJson.data.user.date_of_birth);
                $('#country').val(dataJson.data.user.country);
                $('#field_of_study').val(dataJson.data.user.major_of_study);
                $('#profesion').val(dataJson.data.user.profesion);
            }
        })
    }

    function saveDataUser() {
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var institution = $('#institution').val();
        var phone_number = $('#phone_number').val();
        var status = $("#status").val();

        var place_of_birth = $('#place_of_birth').val();
        var date_of_birth = $('#date_of_birth').val();
        var country = $('#country').val();
        var major_of_study = $('#field_of_study').val();
        var profesion = $('#profesion').val();

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    user_id: "<?= $this->session->userdata["id"] ?>",
                    fullname: fullname,
                    email: email,
                    institution: institution,
                    phone_number: phone_number,
                    status: status,
                    place_of_birth: place_of_birth,
                    date_of_birth: date_of_birth,
                    country: country,
                    major_of_study: major_of_study,
                    profesion: profesion,
                },
                url: 'regisupdate_text2'
            },
            beforeSend: function() {
                $body.addClass('loading');// Note the ,e that I added
            },
            success: function(result) {
                if (results_1.children().length > 0) {
                    resumable_1.upload();
                }
                if (results_2.children().length > 0) {
                    resumable_2.upload();
                }
                if (results_3.children().length > 0) {
                    resumable_3.upload();
                }

                resumable_1.on('fileProgress', function(file) {
                    //Action
                    $body.addClass("loading");
                });

                resumable_1.on('uploadStart', function() {
                    // action
                    $body.addClass("loading");
                });

                resumable_1.on('complete', function() {
                    // Action
                    $body.removeClass("loading");
                });

                resumable_1.on('fileError', function(file, message) {
                    //Action
                    console.log('error');
                    resumable_1.removeFile();
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

                resumable_2.on('fileProgress', function(file) {
                    //Action
                    $body.addClass("loading");
                });

                resumable_2.on('uploadStart', function() {
                    // action
                    $body.addClass("loading");
                });

                resumable_2.on('complete', function() {
                    // Action
                    $body.removeClass("loading");
                });

                resumable_2.on('fileError', function(file, message) {
                    //Action
                    console.log('error');
                    resumable_2.removeFile();
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

                resumable_3.on('fileProgress', function(file) {
                    //Action
                    $body.addClass("loading");
                });

                resumable_3.on('uploadStart', function() {
                    // action
                    $body.addClass("loading");
                });

                resumable_3.on('complete', function() {
                    // Action
                    $body.removeClass("loading");
                });

                resumable_3.on('fileError', function(file, message) {
                    //Action
                    console.log('error');
                    resumable_3.removeFile();
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

                $body.removeClass("loading");
                $('#message').html(
                    '<div id="alertFadeOut" class="alert alert-success alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                    '<div class="alert-body">' +
                    '<b>Congratulation!</b> Data was Saved' +
                    '</div>' +
                    '</div>');
                $("#alertFadeOut").delay(3000)
                    .fadeOut(function() {
                        $(this).remove();
                    });
                loadData();
            }
        })
    }

    var action = 'student_card',
        user_id = '<?= $this->session->userdata["id"] ?>',
        resumableButton_1 = $("#student_card"),
        results_1 = $("#results_student_card"),
        resumable_1 = new Resumable({
            target: noncurl_api_url + send_data_profil_url,
            maxChunkRetries: 5,
            query: {
                action: action,
                user_id: user_id,
            },
            maxFiles: 1,
            fileType: ['pdf', 'docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'ods', 'odt', 'jpg', 'jpeg', 'png'],
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

    var action = 'academic_member',
        user_id = '<?= $this->session->userdata["id"] ?>',
        resumableButton_2 = $("#academic_member"),
        results_2 = $("#results_academic_member"),
        resumable_2 = new Resumable({
            target: noncurl_api_url + send_data_profil_url,
            maxChunkRetries: 5,
            query: {
                action: action,
                user_id: user_id,
            },
            maxFiles: 1,
            fileType: ['pdf', 'docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'ods', 'odt', 'jpg', 'jpeg', 'png'],
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

    var action = 'profile_picture',
        user_id = '<?= $this->session->userdata["id"] ?>',
        resumableButton_3 = $("#profile_picture"),
        results_3 = $("#results_profile_picture"),
        resumable_3 = new Resumable({
            target: noncurl_api_url + send_data_profil_url,
            maxChunkRetries: 5,
            query: {
                action: action,
                user_id: user_id,
            },
            maxFiles: 1,
            fileType: ['jpg', 'jpeg', 'png'],
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

    resumable_1.assignBrowse(resumableButton_1);
    resumable_2.assignBrowse(resumableButton_2);
    resumable_3.assignBrowse(resumableButton_3);

    resumable_1.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_1.append(template);
    });

    resumable_2.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_2.append(template);
    });

    resumable_3.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results_3.append(template);
    });

    $(document).on('click', '.deleteFile', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_1.getFromUniqueIdentifier(identifier);

        resumable_1.removeFile(file);
        parent.remove();
    });

    $(document).on('click', '.deleteFile', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_2.getFromUniqueIdentifier(identifier);

        resumable_2.removeFile(file);
        parent.remove();
    });

    $(document).on('click', '.deleteFile', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable_3.getFromUniqueIdentifier(identifier);

        resumable_3.removeFile(file);
        parent.remove();
    });

    //# sourceURL=/view/user/setting.js
</script>