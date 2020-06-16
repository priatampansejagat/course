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
                                <label for="1">Password</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="password" id="password" name="password" class="form-control element-block" placeholder="Insert your Fullname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="1">Repeat Password</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="password" id="password2" name="password2" class="form-control element-block" placeholder="Insert your email">
                                <div id="pesan_password_ulangi"></div>
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
        $('#password2').on('keyup', function() {
            if ($('#password').val() == $('#password2').val()) {
                $('#pesan_password_ulangi').text("✓ Password Match").css('color', 'green');
            } else if ($('#password').val() == '' || $('#password2').val() == '') {
                $('#pesan_password_ulangi').text("✕ Password cannot be empty").css('color', 'red');
            } else {
                $('#pesan_password_ulangi').text("✕ Password Does'nt Match").css('color', 'red');
            }
        });
    });

    $body = $("body");

    function saveDataUser() {
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    user_id: "<?= $this->session->userdata["id"] ?>",
                    action: 'password',
                    data_update: password,
                },
                url: 'regisupdate_text'
            },
            beforeSend: function() {
                $body.addClass('loading');// Note the ,e that I added
            },
            success: function(result) {
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

    //# sourceURL=/view/user/setting.js
</script>