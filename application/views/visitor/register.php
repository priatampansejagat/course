<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | Research Academy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/auth/images/icons/favicon.ico" />
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

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- Global Constant -->
    <script src="<?= base_url(); ?>assets/global-constant.js"></script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/auth/images/08.jpg'); background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" name="regist_form">
                    <span class="login100-form-title p-b-49">
                        Register
                    </span>

                    <div id="message"></div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Fullname is required">
                        <span class="label-input100">Fullname</span>
                        <input class="input100" type="text" id="fullname" name="fullname" placeholder="Type your Fullname">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Place of Birth is required">
                        <span class="label-input100">Place of Birth</span>
                        <input class="input100" type="text" id="place_of_birth" name="place_of_birth" placeholder="Type your Place of Birth">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Date of Birth is required">
                        <span class="label-input100">Date of Birth</span>
                        <input class="input100 datepicker" type="text" id="date_of_birth" name="date_of_birth" placeholder="Choose your Date">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" id="email" name="email" placeholder="Type your Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Institution is required">
                        <span class="label-input100">Institution</span>
                        <input class="input100" type="text" id="institution" name="institution" placeholder="Type your Institution">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Country is required">
                        <span class="label-input100">Country</span>
                        <select class="input100" id="country" name="country" placeholder="Choose your Country" type="text">
                            <option value="" selected disabled>Select Country</option>
                            <option value="indonesia">Indonesia</option>
                            <option value="india">India</option>
                            <option value="0">Others</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" id="country_inputan" data-validate="Username is required">
                        <input class="input100" type="text" id="country_input" name="country_input" placeholder="Type your Country">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Mobile Number is required">
                        <span class="label-input100">Mobile Number</span>
                        <input class="input100" type="text" id="mobile_number" name="mobile_number" placeholder="Type your Mobile Number">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Status is required">
                        <span class="label-input100">Status</span>
                        <select class="input100" id="status" name="status" placeholder="Status">
                            <option value="" selected disabled>Status</option>
                            <option value="Bachelor">Bachelor/Diploma Student</option>
                            <option value="Master">Master Student</option>
                            <option value="Doctorate">Doctorate Student</option>
                            <option value="Academics">Academics/Lecturer</option>
                            <option value="Practitioner">Practitioner</option>
                            <option value="0">Others</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" id="status_inputan" data-validate="Status is required">
                        <input class="input100" type="text" id="status_input" name="status_input" placeholder="Type your Status">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Field of Study is required">
                        <span class="label-input100">Field of Study</span>
                        <select class="input100" id="field_of_study" name="field_of_study" placeholder="Field of Study">
                            <option value="" selected disabled>Field of Study</option>
                            <option value="Economics">Economics</option>
                            <option value="Management">Management</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Psychology">Psychology</option>
                            <option value="Religion">Religion</option>
                            <option value="Culture">Culture</option>
                            <option value="History">History</option>
                            <option value="Sociology">Sociology</option>
                            <option value="Political_Study">Political Study</option>
                            <option value="Language">Language</option>
                            <option value="Education">Education</option>
                            <option value="Law">Law</option>
                            <option value="Natural_Science">Natural Science</option>
                            <option value="Engineering">Engineering</option>
                            <option value="0">Others</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" id="study_inputan" data-validate="Username is required">
                        <input class="input100" type="text" id="study_input" name="study_input" placeholder="Type your Study">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" id="uname" name="uname" placeholder="Type your Username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" name="password" placeholder="Type your Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100"> Repeat Password</span>
                        <input class="input100" type="password" id="password2" name="password2" placeholder="Repeate your Password">
                        <span class="focus-input100"></span>
                        <span class="float-left p-t-5 p-b-5" style="font-size: 13px;" id="pesan_password_ulangi"></span>
                    </div><br><br>
                </form>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" id="register">
                            Register
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });

            $('#country_inputan').hide();
            $('#status_inputan').hide();
            $('#study_inputan').hide();
            $('#country').change(function() {
                var country = $('#country').val();
                if (country == 0) {
                    $('#country_inputan').show();
                } else {
                    $('#country_inputan').hide();
                }
            });
            $('#status').change(function() {
                var status = $('#status').val();
                if (status == 0) {
                    $('#status_inputan').show();
                } else {
                    $('#status_inputan').hide();
                }
            });
            $('#field_of_study').change(function() {
                var study = $('#field_of_study').val();
                if (study == 0) {
                    $('#study_inputan').show();
                } else {
                    $('#study_inputan').hide();
                }
            });

            $('#date_of_birth').change(function() {
                var dob = $('#date_of_birth').val();
                if (dob != '') {
                    dob = new Date(dob);
                    var today = new Date();
                    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                    $('#age').html(age + ' years old');
                }
            });

            $('#password2').on('keyup', function() {
                if ($('#password').val() == $('#password2').val()) {
                    $('#pesan_password_ulangi').text("✓ Password Match").css('color', 'green');
                } else {
                    $('#pesan_password_ulangi').text("✕ Password Does'nt Match").css('color', 'red');
                }
            });
        });

        $('#register').click(function() {
            var fullname = $('#fullname').val();
            var place_of_birth = $('#place_of_birth').val();
            var date_of_birth = $('#date_of_birth').val();
            var email = $('#email').val();
            var institution = $('#institution').val();
            var country = $('#country').val() == 0 ? $('#country_input').val() : $("#country").val();
            var mobile_number = $('#mobile_number').val();
            var status = $('#status').val() == 0 ? $('#status_input').val() : $("#status").val();
            var field_of_study = $('#field_of_study').val() == 0 ? $('#study_input').val() : $("#field_of_study").val();
            var uname = $('#uname').val();
            var password = $('#password').val();
            var password2 = $('#password2').val();

            var formData = new FormData(document.forms.namedItem("regist_form"));

            if (fullname && place_of_birth && date_of_birth && email && institution && country && mobile_number && status && field_of_study && uname && password) {

                $.ajax({
                    type: 'POST',
                    url: base_url + post_url,
                    data: {
                        param: {
                            "uname": uname,
                            "password": password,
                            "fullname": fullname,
                            "place_of_birth": place_of_birth,
                            "date_of_birth": date_of_birth,
                            "email": email,
                            "institution": institution,
                            "country": country,
                            "mobile_number": mobile_number,
                            "status": status,
                            "field_of_study": field_of_study,
                        },
                        url: add_user_url
                    },
                    success: function(data) {
                        $('#message').html(
                            '<div id="alertFadeOut" class="alert alert-primary alert-dismissible show fadeIn animated" id="alertFadeOut" style="width:100% !important; margin-bottom:20px !important;">' +
                            '<div class="alert-body">' +
                            '<strong>Congratulations! </strong>Data Saved' +
                            '</div>' +
                            '</div>');
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $("#alertFadeOut").fadeOut(3000);
                        window.location.href = "login";
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        $('#message').html(
                            '<div class="alert alert-danger alert-dismissible show fadeIn animated" id="alertFadeOut" style="width:100% !important; margin-bottom:20px !important;">' +
                            '<div class="alert-body">' +
                            '<strong>Sorry! </strong>Data Failed to Save <br>' +
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

        //# sourceURL=/view/register/register.js
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