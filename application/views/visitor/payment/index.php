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
                <li class="active">Payment Confirmation</li>
            </ol>
        </div>
    </nav>
    <!-- user log block -->
    <section class="container user-log-block">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="message"></div>
                <!-- user log form -->
                <form action="#" class="user-log-form" name="form-payment">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="regist_no">Registration Number</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="regist_no" name="regist_no" class="form-control element-block" placeholder="Registration Number" value="<?= $id_payment ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="nominal">Nominal</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="nominal" name="nominal" class="form-control element-block" placeholder="Nominal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="file_payment">Proof of Payment</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <!-- <input type="file" id="file_payment" name="file_payment" class="form-control element-block" placeholder="Username or email address *"> -->
                                <a href="#" class="btn btn-warning">Choose File</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <label for="2"> &nbsp;</label>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="btns-wrap">
                                <a href="#" id="send" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Send</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    $("#send").click(function() {
        var regist_no = $('#regist_no').val();
        var nominal = $('#nominal').val();
        var formData = new FormData(document.forms.namedItem("form-payment"));
        formData.append('url', 'http://temporaryapi.rumahpeneleh.or.id/payconfirm_file');

        var file = $('#file_payment').val();

        if (regist_no && nominal && file != '') {
            $.ajax({
                type: "POST",
                url: base_url + post_url,
                data: {
                    param: {
                        "payment_id": regist_no,
                        "payment_nominal": nominal,
                    },
                    url: send_payment_url
                },
                success: function(data) {
                    $.ajax({
                        url: base_url + post_file_url,
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(data) {}
                    });
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    $('#message').html(
                        '<div id="alertFadeOut" class="alert alert-danger alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                        '<div class="alert-body">' +
                        '<strong>Please,</strong>' +
                        err.message +
                        '</div>' +
                        '</div>');
                }
            });
        } else {
            $('#message').html(
                '<div id="alertFadeOut" class="alert alert-danger alert-dismissible show fadeIn animated" style="width:100% !important; margin-bottom:20px !important;">' +
                '<div class="alert-body">' +
                '<strong>Please,</strong> Complete the Data' +
                '</div>' +
                '</div>');
        }
    });

    //# sourceURL=/view/payment/payment.js
</script>