<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/visitor/images/logo-research-academy.png">
    <title>Login | Research Academy</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/css/main.css">
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/jquery/jquery-3.2.1.min.js"></script>

    <!-- Global Constant -->
    <script src="<?= base_url(); ?>assets/global-constant.js"></script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/auth/images/08.jpg'); background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                        <img class="hidden-xs" src="<?= base_url(); ?>assets/visitor/images/logo-research-academy-dark.png" style="width: 50%" alt="studylms">
                    </span>

                    <div id="message"></div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" id="username" name="username" placeholder="Type your username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <a href="#" class="login100-form-btn" id="send_pass">
                                Set Password
                            </a>
                        </div>
                    </div>
                </form>

                <div class="flex-col-c p-t-50">
                    <p>Back to Login Page? <a href="<?= base_url('login') ?>">Click Here</a></p>
                </div>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script>
        $("#alertFadeOut").fadeOut(3000);

        $('#send_pass').click(function() {
            var username = $('#username').val();

            if (username) {
                $.ajax({
                    type: 'POST',
                    url: base_url + post_url,
                    data: {
                        param: {
                            "username": username,
                        },
                        url: "forgot_pass"
                    },
                    success: function(data) {
                        $('#message').html(
                            '<div id="alertFadeOut" class="alert alert-primary alert-dismissible show fadeIn animated" id="alertFadeOut" style="width:100% !important; margin-bottom:20px !important;">' +
                            '<div class="alert-body">' +
                            '<strong>Congratulations! </strong>Please Check Your Email to Get your New Password' +
                            '</div>' +
                            '</div>');
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $("#alertFadeOut").fadeOut(3000);
                        $("form[name='regist_form']")
                            .closest("form")
                            .trigger("reset");
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        $('#message').html(
                            '<div class="alert alert-danger alert-dismissible show fadeIn animated" id="alertFadeOut" style="width:100% !important; margin-bottom:20px !important;">' +
                            '<div class="alert-body">' +
                            '<strong>Sorry! </strong>Username Does not Exist <br>' +
                            err.message +
                            '</div>' +
                            '</div>');
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $("#alertFadeOut").fadeOut(3000);
                    }
                });
            } else {
                $('#message').html(
                    '<div class="alert alert-danger alert-dismissible show fadeIn animated" id="alertFadeOut" style="width:100% !important; margin-bottom:20px !important;">' +
                    '<div class="alert-body">' +
                    '<strong>Sorry! </strong>Please Fill all Data' +
                    '</div>' +
                    '</div>');
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                $("#alertFadeOut").fadeOut(3000);
            }
        });

        //# sourceURL=/view/login/login.js
    </script>

    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/auth/js/main.js"></script>

</body>

</html>