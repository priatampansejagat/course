<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Register - International Research Collaboration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="<?= base_url(); ?>assets/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="<?= base_url(); ?>assets/admin/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->

    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- Global Constant -->
    <script src="<?= base_url(); ?>assets/global-constant.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="error-body no-top lazy" data-original="assets/img/work.jpg" style="background-image: url('<?= base_url(); ?>assets/admin/assets/img/worldmap.svg'); background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
    <div class="container">
        <div class="row login-container animated fadeInUp">
            <div class="col-md-7 col-md-offset-3 tiles white no-padding">
                <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10" id="header-auth">
                    <h2 class="normal header-text">
                        Register
                    </h2>
                    <h2 class="bold header-text">
                        International Research Collaboration
                    </h2>
                    <span>Online Conference, 17 September 2020</span>
                </div>
                <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
                    <div id="message"></div>
                    <div role="tabpanel" class="tab-pane active" id="tab_login">
                        <form class="animated fadeIn validate" id="regist_form" name="regist_form">
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="fullname">Fullname</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="fullname" name="fullname" placeholder="Input your Name" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="place_of_birth">Place of Birth</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="date_of_birth">Date of Birth</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control datepicker" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" type="text" data-provide="datepicker">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="email">Email</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="institution">Institution</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="institution" name="institution" placeholder="Institution" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="country">Country</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <select class="form-control" id="country" name="country" placeholder="Country" type="text">
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="indonesia">Indonesia</option>
                                        <option value="india">India</option>
                                        <option value="0">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="country_input" name="country_input" placeholder="Enter Your Country" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="mobile_number">Mobile Number</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number (for WhatsApp Group Purpose)" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="status">Status</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <select class="form-control" id="status" name="status" placeholder="Status">
                                        <option value="" selected disabled>Status</option>
                                        <option value="Bachelor">Bachelor/Diploma Student</option>
                                        <option value="Master">Master Student</option>
                                        <option value="Doctorate">Doctorate Student</option>
                                        <option value="Academics">Academics/Lecturer</option>
                                        <option value="Practitioner">Practitioner</option>
                                        <option value="0">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="status_input" name="status_input" placeholder="Enter Your Status" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="field_of_study">Field of Study</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <select class="form-control" id="field_of_study" name="field_of_study" placeholder="Field of Study">
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
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="study_input" name="study_input" placeholder="Enter Your Major" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="uname">Username</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="uname" name="uname" placeholder="Enter Username" type="text">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="password">Password</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password">
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="password2">Repeat Password</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="password2" name="password2" placeholder="Repeat Password" type="password">
                                    <span class="float-left" style="font-size: 13px;" id="pesan_password_ulangi"></span>
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="proof_of_student">Proof of Student</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="proof_of_student" name="proof_of_student" placeholder="Upload Proof of Student" type="file" onchange="return fileValidation1()">
                                    <div id="imagePreview1"></div>
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="proof_of_academic">Proof of Academic</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="proof_of_academic" name="proof_of_academic" placeholder="Upload Proof of Academic" type="file" onchange="return fileValidation2()">
                                    <div id="imagePreview2"></div>
                                </div>
                            </div>
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-3 col-sm-12">
                                    <label class="vertical-center" for="proof_of_payments">Proof of Payments</label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-control" id="proof_of_payments" name="proof_of_payments" placeholder="Upload Proof of Payments" type="file" onchange="return fileValidation3()">
                                    <div id="imagePreview3"></div>
                                </div>
                            </div>
                            <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="control-group col-md-12">
                                    <a href="#" class="btn btn-info btn-cons" id="register" style="width: 100%; background-color: #ffc000;">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });

            $('#country_input').hide();
            $('#status_input').hide();
            $('#study_input').hide();
            $('#country').change(function() {
                var country = $('#country').val();
                if (country == 0) {
                    $('#country_input').show();
                } else {
                    $('#country_input').hide();
                }
            });
            $('#status').change(function() {
                var status = $('#status').val();
                if (status == 0) {
                    $('#status_input').show();
                } else {
                    $('#status_input').hide();
                }
            });
            $('#field_of_study').change(function() {
                var study = $('#field_of_study').val();
                if (study == 0) {
                    $('#study_input').show();
                } else {
                    $('#study_input').hide();
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
                    $('#pesan_password_ulangi').text('✓ Password sesuai').css('color', 'green');
                } else {
                    $('#pesan_password_ulangi').text('✕ Password tidak sesuai').css('color', 'red');
                }
            });
        })

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
            var proof_of_student = $('#proof_of_student').val();
            var proof_of_academic = $('#proof_of_academic').val();
            var proof_of_payments = $('#proof_of_payments').val();

            var formData = new FormData(document.forms.namedItem("regist_form"));
            console.log(fullname);
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
                        '<div id="alertFadeOut" class="alert alert-primary alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                        '<div class="alert-body">' +
                        '<button class="close" data-dismiss="alert">' +
                        '<span>&times;</span>' +
                        '</button>' +
                        '<strong>Congratulations! </strong>Data Saved' +
                        '</div>' +
                        '</div>');
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    $('#message-error').html(
                        '<div class="alert alert-danger alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                        '<div class="alert-body">' +
                        '<button class="close" data-dismiss="alert">' +
                        '<span>&times;</span>' +
                        '</button>' +
                        '<strong>Sorry! </strong>Data Failed to Save <br>' +
                        '</div>' +
                        '</div>');
                }
            });
        });

        function fileValidation1() {
            var fileInput = document.getElementById('imgProfile');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Mohon Maaf! Silahkan Pilih File dengan Ekstensi .jpeg/.jpg/.png/.gif.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview1').innerHTML = '<hr><img class="img-profile" style="height:250px; width: 250px; object-fit: cover; object-position: 100% 0;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        function fileValidation2() {
            var fileInput = document.getElementById('imgProfile');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Mohon Maaf! Silahkan Pilih File dengan Ekstensi .jpeg/.jpg/.png/.gif.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview2').innerHTML = '<hr><img class="img-profile" style="height:250px; width: 250px; object-fit: cover; object-position: 100% 0;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        function fileValidation3() {
            var fileInput = document.getElementById('imgProfile');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Mohon Maaf! Silahkan Pilih File dengan Ekstensi .jpeg/.jpg/.png/.gif.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview3').innerHTML = '<hr><img class="img-profile" style="height:250px; width: 250px; object-fit: cover; object-position: 100% 0;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        //# sourceURL=/view/register/register.js
    </script>

    <!-- END CONTAINER -->
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/admin/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
</body>

</html>